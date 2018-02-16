@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Quizzes</h3>
            <a href="{{ route('admin.quiz.create') }}" class="btn btn-link">Add New Quiz</a>
        </div>
    </div>
    @if (count($quizzes) < 1)
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    There are no Quizzes at this time.
                </div>
            </div>    
        </div>
    </div>
    @endif
    @foreach ($quizzes as $quiz)
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="level">
                        <span class="flex">
                            <a class="btn btn-default flex" href="{{ route('admin.quiz.edit', $quiz->id) }}">Edit</a>
                        </span>
                    </div>
                </div>
                <div class="panel-body">
                        <p>
                            {{ $quiz->name }}
                        </p>
                        <strong>{{ $quiz->category->name }}</strong>
                </div>
                <div class="panel-footer">
                    <div class="level">
                        <form action="{{ route('admin.quiz.destroy', $quiz->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
