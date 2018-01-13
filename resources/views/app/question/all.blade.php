@extends('layouts.app')

@section('content')
<div class="container">
    <div class="questionsHeader">
        <h3>Questions</h3>
        <button class="btn">Create Question</button>
    </div>
    @foreach($questions as $question)
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $question->text }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
