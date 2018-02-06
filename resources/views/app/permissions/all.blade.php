@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Roles</h3>
            <a href="/role/create" class="btn btn-link">Create Role</a>
        </div>
    </div>
    @if (count($roles) < 1)
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-body">There are no Roles at this time.</div>
            </div>
        </div>
    </div>
    @endif
    @foreach($roles as $role)
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="level">
                        <a href="/role/{{ $role->id }}/edit" class="btn btn-default">Edit</a>
                    </div>
                </div>
                <div class="panel-body">
                    <p>
                        {{ $role->label }}
                    </p>
                    <strong>{{ $role->name }}</strong>
                </div>
                <div class="panel-footer">
                    <form action="/role/{{ $role->id }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<hr />

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Permissions</h3>
            <a href="/permission/create" class="btn btn-link">Create Role</a>
        </div>
    </div>
    @if (count($permissions) < 1)
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-body">There are no Permission at this time.</div>
            </div>
        </div>
    </div>
    @endif
    @foreach($permissions as $permission)
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="level">
                        <a href="/permission/{{ $permission->id }}/edit" class="btn btn-default">Edit</a>
                    </div>
                </div>
                <div class="panel-body">
                    <p>
                        {{ $permission->label }}
                    </p>
                    <strong>{{ $permission->name }}</strong>
                </div>
                <div class="panel-footer">
                    <form action="/permission/{{ $permission->id }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
