@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Questions</h3>
            <a href="{{ route('admin.question.create') }}" class="btn btn-link">Create Question</a>
        </div>
    </div>
    @if (count($questions) < 1)
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-body">There are no Questions at this time.</div>
            </div>
        </div>
    </div>
    @endif
    @foreach($questions as $question)
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="level">
                        <a href="{{ route('admin.question.edit', $question->id) }}" class="btn btn-default">Edit</a>
                    </div>
                </div>
                <div class="panel-body">
                    <p>{{ $question->text }}</p>
                    @if ($question->quiz)
                    <strong>{{ $question->quiz->name }}</strong>
                    @endif
                </div>
                <div class="panel-footer">
                    <form action="{{ route('admin.question.destroy', $question->id) }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
