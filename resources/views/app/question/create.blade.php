@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post" action="/question">
                @include('app.question.form', [
                    'question' => new App\Question
                ])
            </form>
        </div>
    </div>
</div>
@endsection
