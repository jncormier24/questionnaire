<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $questions = Question::all();
      return view('app.question.all', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizzes = \App\Quiz::all();
        return view('app.question.create', compact('quizzes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new \App\Question;

        request()->validate([
            'text' => 'required',
            'notes' => 'required',
            'quiz_id' => 'required',
            'answer_type_id' => 'required'
        ]);

        $question->text = $request->text;
        $question->notes = $request->notes;
        $question->quiz_id = $request->quiz_id;
        $question->answer_type_id = $request->answer_type_id;
        $question->updated_by_user_id = auth()->id();

        $question->save();

        return redirect()->route('admin.question.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $quizzes = \App\Quiz::all();
        return view('app.question.edit', compact('question', 'quizzes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question)
    {
        $question->update(request()->validate([
            'text' => 'required',
            'notes' => 'required',
            'quiz_id' => 'required',
            'answer_type_id' => 'required'
        ]));

        return redirect()->route('admin.question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('admin.question.index');
    }
}
