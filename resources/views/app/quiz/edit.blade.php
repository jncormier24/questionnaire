@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="PATCH" action="/quiz/{$quiz->id}">
                @include('app.quiz.form')
            </form>
        </div>
    </div>
</div>
@endsection
