@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="pull-right">
            <a href="/quiz/create" class="btn btn-primary">Add New Quiz</a>
        </div>
    </div>
    @foreach ($quizzes as $quiz)
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                  <p>
                      {{ $quiz->name }}
                  </p>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-default" href="/quiz/{{ $quiz->id }}/edit">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
