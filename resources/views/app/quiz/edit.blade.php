@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post" action="/quiz/{{ $quiz->id }}">
                {{ method_field('PATCH') }}

                @include('app.quiz.form')
            </form>
        </div>
    </div>
</div>
@endsection
