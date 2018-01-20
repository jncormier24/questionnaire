@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Create Quiz Category</h3>
            <form action="/quizcategory" method="POST">
                {{ csrf_field() }}
                @include('app.quizcat._form',['quizcategory' => new App\QuizCategory])
            </form>
        </div>
    </div>
</div>
@endsection