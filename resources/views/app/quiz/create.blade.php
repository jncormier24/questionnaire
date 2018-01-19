@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="/quiz">
                @include('app.quiz.form', 
                    ['quiz' => new App\Quiz]
                )
            </form>
        </div>
    </div>
</div>
@endsection
