@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Questions</h3>
            <a href="/question/create" class="btn btn-link">Create Question</a>
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
                        <a href="/question/{{ $question->id }}/edit" class="btn btn-default">Edit</a>
                    </div>
                </div>
                <div class="panel-body">
                    {{ $question->text }}
                </div>
                <div class="panel-footer">
                    <form action="/question/{{ $question->id }}" method="POST">
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
