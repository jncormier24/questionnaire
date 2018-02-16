@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.question') }}" method="POST">
                {{ csrf_field() }}

                @include('app.question.form', [ 'question' => new App\Question ])
            </form>
        </div>
    </div>
</div>
@endsection
