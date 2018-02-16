<?php

Auth::routes();

Route::get('/auth0/callback', '\Auth0\Login\Auth0Controller@callback');

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'AppController@index');
    Route::get('/home', 'AppController@index');

    Route::name('admin.')->prefix('admin')->group(function () {
        Route::resource('question', 'QuestionController');
        Route::resource('quiz', 'QuizController');
        Route::post('/quiz/{quiz}/user', 'QuizController@addUser')->name('quiz.adduser');
        Route::resource('quizcategory', 'QuizCategoryController');
        Route::resource('answer', 'AnswerController');
        Route::resource('permission', 'PermissionController');
        Route::resource('user', 'UserController');
        Route::resource('course', 'CourseController');
        Route::resource('coursematerial', 'CourseMaterialController');

    });

    // expanded routes
    Route::get('/quiz/evaluation/{quiz}', 'QuizController@showEvaluation');
});

