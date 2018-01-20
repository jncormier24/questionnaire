@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Edit Quiz Category</h3>
            <form method="post" action="/quizcategory/{{ $quizcategory->id }}">
                {{ method_field('PATCH') }}
                @include('app.quizcat._form')
            </form>
        </div>
    </div>
</div>
@endsection