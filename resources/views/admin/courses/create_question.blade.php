@extends('layouts.admin')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
    <div class="container">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ $test->name }}</h1>

       <form id="questionForm" class="space-y-6" action="{{ route('courses.storeQuestion', $test->id) }}" method="POST">
    @csrf

    <!-- Question Text -->
    <div>
        <label for="questionText" class="block text-sm font-medium text-gray-700 mb-2">
            Question Text *
        </label>
        <textarea id="questionText" name="question_text"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Enter your question here..." required>{{ old('question') }}</textarea>
        @error('question')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Multiple Choice Options -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-4">
            Answer Options *
        </label>

        <div class="space-y-3">
            @foreach (['a', 'b', 'c', 'd'] as $letter)
                <div class="flex items-center space-x-3">
                    <input type="radio" id="correct{{ $letter }}" name="correct_answer" value="{{ $letter }}"
                        {{ old('correct_answer') === $letter ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                    <div class="flex items-center space-x-2 flex-1">
                        <span class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold">
                            {{ $letter }}
                        </span>
                        <input type="text" id="answer_{{ strtolower($letter) }}" name="answer_{{ strtolower($letter) }}"
                            value="{{ old('answer_' . strtolower($letter)) }}"
                            class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter option {{ $letter }}" required>
                    </div>
                </div>
                @error('answer_' . strtolower($letter))
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            @endforeach

        </div>
        @error('correct_answer')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
        <p class="text-sm text-gray-500 mt-2">Select the radio button next to the correct answer</p>
    </div>

    <!-- Submit Button -->
    <div class="flex justify-between space-x-4 pt-4 w-full">
        <a href="{{ route(auth()->user()->role === 0 ?"admin.courses.index" : "instructot.courses.index") }}"
            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-6 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
            Back to Courses</a>
        <button type="submit"
            class="ml-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Save Question
        </button>
    </div>
</form>

    @forelse ($questions as $question )
         <div id="questionsDisplay" class="mt-8 bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Created Questions</h2>
            <div class="border border-gray-200 rounded-lg p-6 bg-gray-50">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Question {{ $loop->iteration }}</h3>
                    <!-- Trigger Modal -->
<button type="button" class="text-red-500 hover:text-red-700 text-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-danger" id="exampleModalLabel">Konfirmasi Hapus</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p>Apakah mau menghapus pertanyaan ini?</p>
			</div>
			<div class="modal-footer">
				<form action="{{ route('courses.deleteQuestion', $question->id) }}" method="POST">
					@csrf
					@method('DELETE')
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</form>
			</div>
		</div>
	</div>
</div>

                  
                </div>
                <p class="text-gray-700 mb-4">{{$question->question_text}}</p>
                <div class="space-y-2">
                    <div class="flex items-center space-x-2">
                        <span
                            class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold ${{$question->correct_answer === 'a' ? 'bg-green-500' : ''}}">A</span>
                        <span class="text-gray-700">{{ $question->answer_a }}</span>
                        @if ($question->correct_answer === 'a')
    <span class="text-green-600 text-sm font-medium">✓ Correct</span>
@endif

                    </div>    
                    <div class="flex items-center space-x-2">
                        <span
                            class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold ${{$question->correct_answer === 'b' ? 'bg-green-500' : ''}}">B</span>
                        <span class="text-gray-700">{{ $question->answer_b }}</span>
                        @if ($question->correct_answer === 'b')
    <span class="text-green-600 text-sm font-medium">✓ Correct</span>
@endif

                    </div>    
                    <div class="flex items-center space-x-2">
                        <span
                            class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold ${{$question->correct_answer === 'c' ? 'bg-green-500' : ''}}">C</span>
                        <span class="text-gray-700">{{ $question->answer_c }}</span>
                        @if ($question->correct_answer === 'c')
    <span class="text-green-600 text-sm font-medium">✓ Correct</span>
@endif

                    </div>    
                    <div class="flex items-center space-x-2">
                        <span
                            class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-semibold ${{$question->correct_answer === 'd' ? 'bg-green-500' : ''}}">D</span>
                        <span class="text-gray-700">{{ $question->answer_d }}</span>
                        @if ($question->correct_answer === 'd')
    <span class="text-green-600 text-sm font-medium">✓ Correct</span>
@endif

                    </div>    
                   
                </div>
            </div>
        </div>
    @empty
        
    @endforelse

   
    </div>
@endsection