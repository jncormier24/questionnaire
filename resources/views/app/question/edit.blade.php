@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.question.update', $question->id) }}" method="POST">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                @include('app.question.form')
            </form>
        </div>
    </div>
</div>
@endsection
