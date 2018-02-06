@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="header">
                <h3>{{ $quiz->name }}</h3>
            </div>
        </div>
    </div>
    @include('app.partials._formerror')
    <form action="/answer" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}" />
        @foreach($quiz->questions as $question) 
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-defaul">
                    <div class="panel-body">
                        <p>{{ $question->text }}</p>
                        </p>{{ $question->notes }}</p>
                        @include('app.quiz._answer')
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <button type="submit" class="btn btn-success">Save</button>
        <a href="/home" class="btn btn-danger">Cancel</a>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    
                </div>
            </div>
        </div>
    </form>
</div>
@endsection