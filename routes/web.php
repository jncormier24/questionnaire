<?php

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'AppController@index');
    Route::get('/home', 'AppController@index');
    Route::resource('question', 'QuestionController');
    Route::resource('quiz', 'QuizController');
    Route::resource('quizcategory', 'QuizCategoryController');
    Route::resource('answer', 'AnswerController');

    // expanded routes
    Route::post('/quiz/{quiz}/user', 'QuizController@addUser');
});

