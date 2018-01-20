@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h3>Quiz Categories</h3>
        <a href="/quizcategory/create" class="btn btn-link">Create A Quiz Category</a>
    </div>
    @if(count($quizcats) < 1)
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">There are no Quiz Categories at this time.</div>
        </div>
    </div>
    @endif
    @foreach($quizcats as $quizCat)
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="/quizcategory/{{ $quizCat->id }}/edit" class="btn btn-default">Edit</a>
            </div>
            <div class="panel-body">
                {{ $quizCat->name }}
            </div>
            <div class="panel-footer">
                <form action="/quizcategory/{{ $quizCat->id }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">Delete</button>
                    </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection