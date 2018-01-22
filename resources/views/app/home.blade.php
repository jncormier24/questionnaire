@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12"><h3>Assigned Quizzes</h3></div>
    </div>
    @if(count(auth()->user()->quizzes) < 1)
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-body"><p>You are not assigned any quizzes at this time.</p></div>
            </div>
        </div>
    </div>
    @endif
    @foreach(auth()->user()->quizzes as $quiz)
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-body">
                  <p>{{ $quiz->name }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
