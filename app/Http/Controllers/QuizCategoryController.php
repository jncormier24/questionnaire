<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuizCategory;

class QuizCategoryController extends Controller
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
        $quizcats = QuizCategory::all();

        return view('app.quizcat.all', compact('quizcats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.quizCat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $quizcategory = new QuizCategory;

        request()->validate([
            'name' => 'required'
        ]);

        $quizcategory->name = request('name');
        $quizcategory->updated_by_user_id = auth()->id();
        $quizcategory->save();

        return redirect('/quizcategory');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(QuizCategory $quizcategory)
    {
        return view('app.quizcat.edit', compact('quizcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizCategory $quizcategory)
    {
        $quizcategory->update(request()->validate([
            'name' => 'required'
        ]));

        return redirect('/quizcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuizCategory $quizcategory)
    {
        $quizcategory->delete();

        return redirect('/quizcategory');
    }
}
