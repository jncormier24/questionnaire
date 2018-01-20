<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\QuizCategory;

class QuizController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::latest()->get();

        return view('app.quiz.all', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizCats = \App\QuizCategory::all();
        return view('app.quiz.create', compact('quizCats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        $quiz = Quiz::create([
            'name' => request('name'),
            'quiz_category_id' => request('quiz_category_id') ? request('quiz_category_id') : 0,
            'updated_by_user_id' => auth()->user()->id
        ]);

        return redirect("/quiz");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        $quizCats = \App\QuizCategory::all();
        return view('app.quiz.edit', compact('quiz', 'quizCats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Quiz $quiz)
    {
        $quiz->update(request()->validate([
            'name' => 'required'
        ]));

        return redirect('/quiz');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect('/quiz');
    }
}
