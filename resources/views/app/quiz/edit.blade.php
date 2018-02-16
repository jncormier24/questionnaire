@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.quiz.update', $quiz->id) }}" method="POST" >
                {{ method_field('PATCH') }}

                @include('app.quiz.form')
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.quiz.adduser', $quiz->id) }}" method="POST">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="user_id">Assign a User</label>
                    <select name="user_id" class="form-control">
                        @foreach($users as $user) 
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-success">Add User</button>
            </form>
            <div class="form-group">
                <div class="row">
                    @foreach($quiz->users as $user) 
                    <div class="col-xs-3">
                        {{ $user->name }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
