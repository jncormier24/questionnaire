<?php

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'AppController@index');
    Route::resource('question', 'QuestionController');
    Route::resource('quiz', 'QuizController');
    Route::resource('quizcategory', 'QuizCategoryController');
});

