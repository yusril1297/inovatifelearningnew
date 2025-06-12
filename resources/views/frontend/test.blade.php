@extends('layouts.front')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
<div class="w-full px-5000 py-10 max-w-screen-xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-5xl font-bold text-gray-8000 mb-2">{{ $test->name }}</h1>
        </div>

        <!-- Test Container -->
        <div id="testContainer" class="bg-white rounded-xl shadow-lg p-10">
            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-600">Progress</span>
                    <span id="progressText" class="text-sm font-medium text-gray-600">1 of 5</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div id="progressBar" class="bg-blue-500 h-2 rounded-full transition-all duration-300" style="width: 20%"></div>
                </div>
            </div>

            <!-- Question Container -->
            <div id="questionContainer">
                <div class="mb-6">
                    <h2 id="questionNumber" class="text-lg font-semibold text-gray-500 mb-2">Pertanyaan 1</h2>
                    <h3 id="questionText" class="text-2xl font-bold text-gray-800 mb-6">{{ $questions[0]->question_text }}</h3>
                </div>

                <!-- Answer Options -->
                <div id="optionsContainer" class="space-y-3 mb-8">
                    <!-- Options will be populated by JavaScript -->
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between items-center">
                    <button id="prevBtn" class="flex items-center px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        <i class="fas fa-chevron-left mr-2"></i>
                        Sebelumnya
                    </button>
                    
                    <div class="flex space-x-3">
                        <button id="nextBtn" class="flex items-center px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                            Selanjutnya
                            <i class="fas fa-chevron-right ml-2"></i>
                        </button>
                        <button id="submitBtn" class="hidden flex items-center px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                            <i class="fas fa-check mr-2"></i>
                            Kumpulkan
                        </button>
                    </div>
                </div>
            </div>

            <!-- Results Container -->
           <div id="resultsContainer" class="hidden">
    <div class="text-center">
        <div id="scoreIcon" class="text-6xl mb-4">🎉</div>
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Tes Selesai!</h2>
        <div id="scoreDisplay" class="text-xl text-gray-600 mb-6">Anda mendapat skor 0 dari 5</div>
        <div id="scorePercentage" class="text-4xl font-bold text-green-500 mb-8">0%</div>

        {{-- <!-- Back to Course Button -->
        <a href="{{ route("frontend.learning", ["course" => $course->title, "video"=> $course->videos[0]->id]) }}"
 
           class="flex items-center mx-auto px-6 py-3 mb-4 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition-colors w-max">
           <i class="fas fa-arrow-left mr-2"></i> Kembali ke Kelas
        </a> --}}

        <!-- Detailed Results -->
        <div id="detailedResults" class="text-left bg-gray-50 rounded-lg p-6 mb-6">
            <!-- Results will be populated by JavaScript -->
        </div>

        <button id="restartBtn" class="flex items-center mx-auto px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
            <i class="fas fa-redo mr-2"></i>
            Ikuti Tes Lagi
        </button>
    </div>
</div>

        </div>
    </div>

    <script>
        const dataQuestion = @json($questions);

        const questions = dataQuestion.map(q => ({
            id: q.id,
            question: q.question_text,
            options: [q.answer_a, q.answer_b, q.answer_c, q.answer_d],
            correct: q.correct_answer.toLowerCase() === 'a' ? 0 : 
                     q.correct_answer.toLowerCase() === 'b' ? 1 : 
                     q.correct_answer.toLowerCase() === 'c' ? 2 : 
                     q.correct_answer.toLowerCase() === 'd' ? 3 : null
        }));

        console.log(questions);

        // const questions = [
        //     {
        //         id: 1,
        //         question: "What is the capital of France?",
        //         options: ["London", "Berlin", "Paris", "Madrid"],
        //         correct: 2
        //     },
        //     {
        //         id: 2,
        //         question: "Which planet is known as the Red Planet?",
        //         options: ["Venus", "Mars", "Jupiter", "Saturn"],
        //         correct: 1
        //     },
        //     {
        //         id: 3,
        //         question: "What is 2 + 2?",
        //         options: ["3", "4", "5", "6"],
        //         correct: 1
        //     },
        //     {
        //         id: 4,
        //         question: "Who painted the Mona Lisa?",
        //         options: ["Van Gogh", "Picasso", "Leonardo da Vinci", "Michelangelo"],
        //         correct: 2
        //     },
        //     {
        //         id: 5,
        //         question: "What is the largest ocean on Earth?",
        //         options: ["Atlantic", "Indian", "Arctic", "Pacific"],
        //         correct: 3
        //     }
        // ];


        // State
        let currentQuestion = 0;
        let answers = {};

        // DOM elements
        const questionContainer = document.getElementById('questionContainer');
        const resultsContainer = document.getElementById('resultsContainer');
        const questionNumber = document.getElementById('questionNumber');
        const questionText = document.getElementById('questionText');
        const optionsContainer = document.getElementById('optionsContainer');
        const progressBar = document.getElementById('progressBar');
        const progressText = document.getElementById('progressText');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const restartBtn = document.getElementById('restartBtn');

        // Initialize test
        function initTest() {
            displayQuestion();
            updateNavigation();
            updateProgress();
        }

        // Display current question
        function displayQuestion() {
            const question = questions[currentQuestion];
            questionNumber.textContent = `Question ${currentQuestion + 1}`;
            questionText.textContent = question.question;
            
            optionsContainer.innerHTML = '';
            question.options.forEach((option, index) => {
                const optionDiv = document.createElement('div');
                optionDiv.className = `option-item p-4 border-2 rounded-lg cursor-pointer transition-all duration-200 hover:bg-blue-50 ${
                    answers[currentQuestion] === index ? 'border-blue-500 bg-blue-50' : 'border-gray-200'
                }`;
                optionDiv.innerHTML = `
                    <div class="flex items-center">
                        <div class="w-6 h-6 rounded-full border-2 mr-3 flex items-center justify-center ${
                            answers[currentQuestion] === index ? 'border-blue-500 bg-blue-500' : 'border-gray-300'
                        }">
                            ${answers[currentQuestion] === index ? '<i class="fas fa-check text-white text-xs"></i>' : ''}
                        </div>
                        <span class="text-lg">${option}</span>
                    </div>
                `;
                optionDiv.addEventListener('click', () => selectAnswer(index));
                optionsContainer.appendChild(optionDiv);
            });
        }

        // Select answer
        function selectAnswer(index) {
            answers[currentQuestion] = index;
            displayQuestion();
            updateNavigation();
        }

        // Update navigation buttons
        function updateNavigation() {
            prevBtn.disabled = currentQuestion === 0;
            
            if (currentQuestion === questions.length - 1) {
                nextBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
            } else {
                nextBtn.classList.remove('hidden');
                submitBtn.classList.add('hidden');
            }
        }

        // Update progress bar
        function updateProgress() {
            const progress = ((currentQuestion + 1) / questions.length) * 100;
            progressBar.style.width = `${progress}%`;
            progressText.textContent = `${currentQuestion + 1} of ${questions.length}`;
        }

        // Next question
        function nextQuestion() {
            if (currentQuestion < questions.length - 1) {
                currentQuestion++;
                displayQuestion();
                updateNavigation();
                updateProgress();
            }
        }

        // Previous question
        function prevQuestion() {
            if (currentQuestion > 0) {
                currentQuestion--;
                displayQuestion();
                updateNavigation();
                updateProgress();
            }
        }

        // Submit test
        function submitTest() {
            showResults();
        }

        // Show results
        function showResults() {
            const score = calculateScore();
            const percentage = Math.round((score / questions.length) * 100);
            
            questionContainer.classList.add('hidden');
            resultsContainer.classList.remove('hidden');
            
            document.getElementById('scoreDisplay').textContent = `Nilai Anda ${score} dari ${questions.length}`;
            document.getElementById('scorePercentage').textContent = `${percentage}%`;
            
            // Update score color and icon
            const scorePercentageEl = document.getElementById('scorePercentage');
            const scoreIconEl = document.getElementById('scoreIcon');
            
            if (percentage >= 80) {
                scorePercentageEl.className = 'text-4xl font-bold text-green-500 mb-8';
                scoreIconEl.textContent = '🎉';
            } else if (percentage >= 60) {
                scorePercentageEl.className = 'text-4xl font-bold text-yellow-500 mb-8';
                scoreIconEl.textContent = '👍';
            } else {
                scorePercentageEl.className = 'text-4xl font-bold text-red-500 mb-8';
                scoreIconEl.textContent = '📚';
            }
            
            displayDetailedResults();
        }

        // Calculate score
        function calculateScore() {
            let correct = 0;
            questions.forEach((question, index) => {
                if (answers[index] === question.correct) {
                    correct++;
                }
            });
            return correct;
        }

        // Display detailed results
        function displayDetailedResults() {
            const detailedResults = document.getElementById('detailedResults');
            detailedResults.innerHTML = '<h3 class="font-bold text-lg mb-4">Detail Terperinci:</h3>';
            
            questions.forEach((question, index) => {
                const isCorrect = answers[index] === question.correct;
                const userAnswer = answers[index] !== undefined ? question.options[answers[index]] : 'Belum Terjawab';
                const correctAnswer = question.options[question.correct];
                
                const resultItem = document.createElement('div');
                resultItem.className = 'mb-4 p-3 rounded-lg ' + (isCorrect ? 'bg-green-100' : 'bg-red-100');
                resultItem.innerHTML = `
                    <div class="flex items-start">
                        <div class="mr-3 mt-1">
                            <i class="fas ${isCorrect ? 'fa-check-circle text-green-500' : 'fa-times-circle text-red-500'}"></i>
                        </div>
                        <div>
                            <p class="font-semibold">${question.question}</p>
                            <p class="text-sm mt-1">Jawaban Anda: <span class="${isCorrect ? 'text-green-600' : 'text-red-600'}">${userAnswer}</span></p>
                            ${!isCorrect ? `<p class="text-sm text-green-600">Jawaban yang benar:: ${correctAnswer}</p>` : ''}
                        </div>
                    </div>
                `;
                detailedResults.appendChild(resultItem);
            });
        }

        // Restart test
        function restartTest() {
            currentQuestion = 0;
            answers = {};
            questionContainer.classList.remove('hidden');
            resultsContainer.classList.add('hidden');
            initTest();
        }

        // Event listeners
        prevBtn.addEventListener('click', prevQuestion);
        nextBtn.addEventListener('click', nextQuestion);
        submitBtn.addEventListener('click', submitTest);
        restartBtn.addEventListener('click', restartTest);

        // Initialize the test
        initTest();
    </script>
</body>
</html>

@endsection