<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function create(Test $test)
    {
        $questions = Question ::where('test_id', $test->id)->get();
        return view('admin.courses.create_question', compact('test', 'questions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $test = Test::create($validated);

        return redirect()->route('admin.courses.show', $test->course_id)
                         ->with('success', 'Test created successfully.');
    }

    public function createQuestion(Test $test)
    {
        return view('admin.courses.create_question', compact('test'));
    }

    public function storeQuestion(Request $request, Test $test)
    {
        $validated = $request->validate([
            'question_text' => 'required|string|max:255',
            'answer_a' => 'required|string|max:255',
            'answer_b' => 'required|string|max:255',
            'answer_c' => 'required|string|max:255',
            'answer_d' => 'required|string|max:255',
            'correct_answer' => 'required|in:a,b,c,d',
        ]);
        

        $validated['test_id'] = $test->id;

        Question::create($validated);

        return redirect()->route('courses.createQuestion', $test)
                         ->with('success', 'Question added successfully.');
    }

    public function destroyQuestion(Question $question)
    {
        $testId = $question->test_id;
        $question->delete();

        return redirect()->route('courses.createQuestion', $testId)
                         ->with('success', 'Question deleted successfully.');
    }
}
