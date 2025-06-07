<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Question Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-2xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Create New Question</h1>
            
            <form id="questionForm" class="space-y-6">
                <!-- Question Text -->
                <div>
                    <label for="questionText" class="block text-sm font-medium text-gray-700 mb-2">
                        Question Text *
                    </label>
                    <textarea 
                        id="questionText" 
                        rows="4" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter your question here..."
                        required
                    ></textarea>
                </div>

                <!-- Multiple Choice Options -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-4">
                        Answer Options *
                    </label>
                    <div class="space-y-3">
                        <!-- Option A -->
                        <div class="flex items-center space-x-3">
                            <input 
                                type="radio" 
                                id="correctA" 
                                name="correctAnswer" 
                                value="A"
                                class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                            >
                            <div class="flex items-center space-x-2 flex-1">
                                <span class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold">A</span>
                                <input 
                                    type="text" 
                                    id="optionA" 
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter option A"
                                    required
                                >
                            </div>
                        </div>

                        <!-- Option B -->
                        <div class="flex items-center space-x-3">
                            <input 
                                type="radio" 
                                id="correctB" 
                                name="correctAnswer" 
                                value="B"
                                class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                            >
                            <div class="flex items-center space-x-2 flex-1">
                                <span class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold">B</span>
                                <input 
                                    type="text" 
                                    id="optionB" 
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter option B"
                                    required
                                >
                            </div>
                        </div>

                        <!-- Option C -->
                        <div class="flex items-center space-x-3">
                            <input 
                                type="radio" 
                                id="correctC" 
                                name="correctAnswer" 
                                value="C"
                                class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                            >
                            <div class="flex items-center space-x-2 flex-1">
                                <span class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold">C</span>
                                <input 
                                    type="text" 
                                    id="optionC" 
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter option C"
                                    required
                                >
                            </div>
                        </div>

                        <!-- Option D -->
                        <div class="flex items-center space-x-3">
                            <input 
                                type="radio" 
                                id="correctD" 
                                name="correctAnswer" 
                                value="D"
                                class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                            >
                            <div class="flex items-center space-x-2 flex-1">
                                <span class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold">D</span>
                                <input 
                                    type="text" 
                                    id="optionD" 
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter option D"
                                    required
                                >
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Select the radio button next to the correct answer</p>
                </div>

                <!-- Submit Buttons -->
                <div class="flex space-x-4 pt-4">
                    <button 
                        type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        Save Question
                    </button>
                    <button 
                        type="button" 
                        onclick="clearForm()" 
                        class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                    >
                        Clear Form
                    </button>
                </div>
            </form>
        </div>

        <!-- Success Message (hidden by default) -->
        <div id="successMessage" class="hidden mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                Question saved successfully!
            </div>
        </div>

        <!-- Questions Display -->
        <div id="questionsDisplay" class="mt-8 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Created Questions</h2>
            <div class="border border-gray-200 rounded-lg p-6 bg-gray-50">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Question ${index + 1}</h3>
                        <button onclick="deleteQuestion(${question.id})" class="text-red-500 hover:text-red-700 text-sm">
                            Delete
                        </button>
                    </div>
                    <p class="text-gray-700 mb-4">${question.text}</p>
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold ${question.correctAnswer === 'A' ? 'bg-green-500' : ''}">A</span>
                            <span class="text-gray-700">${question.options.A}</span>
                            ${question.correctAnswer === 'A' ? '<span class="text-green-600 text-sm font-medium">✓ Correct</span>' : ''}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold ${question.correctAnswer === 'B' ? 'bg-green-500' : ''}">B</span>
                            <span class="text-gray-700">${question.options.B}</span>
                            ${question.correctAnswer === 'B' ? '<span class="text-green-600 text-sm font-medium">✓ Correct</span>' : ''}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold ${question.correctAnswer === 'C' ? 'bg-green-500' : ''}">C</span>
                            <span class="text-gray-700">${question.options.C}</span>
                            ${question.correctAnswer === 'C' ? '<span class="text-green-600 text-sm font-medium">✓ Correct</span>' : ''}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold ${question.correctAnswer === 'D' ? 'bg-green-500' : ''}">D</span>
                            <span class="text-gray-700">${question.options.D}</span>
                            ${question.correctAnswer === 'D' ? '<span class="text-green-600 text-sm font-medium">✓ Correct</span>' : ''}
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <script>
        let questions = [];
        
        document.getElementById('questionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const questionText = document.getElementById('questionText').value.trim();
            const optionA = document.getElementById('optionA').value.trim();
            const optionB = document.getElementById('optionB').value.trim();
            const optionC = document.getElementById('optionC').value.trim();
            const optionD = document.getElementById('optionD').value.trim();
            const correctAnswer = document.querySelector('input[name="correctAnswer"]:checked');
            
            // Validate form
            if (!questionText) {
                alert('Please enter a question text');
                return;
            }
            
            if (!optionA || !optionB || !optionC || !optionD) {
                alert('Please fill in all answer options');
                return;
            }
            
            if (!correctAnswer) {
                alert('Please select the correct answer');
                return;
            }
            
            // Create question object
            const question = {
                id: Date.now(), // Simple ID generation
                text: questionText,
                options: {
                    A: optionA,
                    B: optionB,
                    C: optionC,
                    D: optionD
                },
                correctAnswer: correctAnswer.value,
                createdAt: new Date().toISOString()
            };
            
            // Add question to array
            questions.push(question);
            
            // Display questions
            displayQuestions();
            
            // Show success message
            showSuccessMessage();
            
            // Clear form
            clearForm();
        });
        
        function clearForm() {
            document.getElementById('questionForm').reset();
        }
        
        function showSuccessMessage() {
            const message = document.getElementById('successMessage');
            message.classList.remove('hidden');
            
            // Hide message after 3 seconds
            setTimeout(() => {
                message.classList.add('hidden');
            }, 3000);
        }
        
        function displayQuestions() {
            const questionsList = document.getElementById('questionsList');
            
            if (questions.length === 0) {
                questionsList.innerHTML = '<p class="text-gray-500 text-center py-8">No questions created yet. Add your first question above!</p>';
                return;
            }
            
            questionsList.innerHTML = questions.map((question, index) => `
                <div class="border border-gray-200 rounded-lg p-6 bg-gray-50">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Question ${index + 1}</h3>
                        <button onclick="deleteQuestion(${question.id})" class="text-red-500 hover:text-red-700 text-sm">
                            Delete
                        </button>
                    </div>
                    <p class="text-gray-700 mb-4">${question.text}</p>
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold ${question.correctAnswer === 'A' ? 'bg-green-500' : ''}">A</span>
                            <span class="text-gray-700">${question.options.A}</span>
                            ${question.correctAnswer === 'A' ? '<span class="text-green-600 text-sm font-medium">✓ Correct</span>' : ''}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold ${question.correctAnswer === 'B' ? 'bg-green-500' : ''}">B</span>
                            <span class="text-gray-700">${question.options.B}</span>
                            ${question.correctAnswer === 'B' ? '<span class="text-green-600 text-sm font-medium">✓ Correct</span>' : ''}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold ${question.correctAnswer === 'C' ? 'bg-green-500' : ''}">C</span>
                            <span class="text-gray-700">${question.options.C}</span>
                            ${question.correctAnswer === 'C' ? '<span class="text-green-600 text-sm font-medium">✓ Correct</span>' : ''}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold ${question.correctAnswer === 'D' ? 'bg-green-500' : ''}">D</span>
                            <span class="text-gray-700">${question.options.D}</span>
                            ${question.correctAnswer === 'D' ? '<span class="text-green-600 text-sm font-medium">✓ Correct</span>' : ''}
                        </div>
                    </div>
                </div>
            `).join('');
        }
        
        function deleteQuestion(id) {
            if (confirm('Are you sure you want to delete this question?')) {
                questions = questions.filter(q => q.id !== id);
                displayQuestions();
            }
        }
    </script>
</body>
</html>