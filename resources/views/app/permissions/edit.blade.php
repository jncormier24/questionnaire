@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="/permission/{{ $permission->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group">
                    <div class="field">
                        <label for="text">Label</label>
                        <input class="form-control" name="label" value="{{ old('label') ?? $permission->label }}" />
                    </div>
                    <div class="field">
                        <label for="notes">Name</label>
                        <p><strong>Note:</strong> The name of a permission is how it is accessed in the code. An example of this is 'site:access'.</p>
                        <input class="form-control" name="name" value="{{ old('name') ?? $permission->name }}" />
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Save</button>
                    <a href="/permission" class="btn btn-danger">Cancel</a>
                </div>

                @include('app.partials._formerror')
            </form>
        </div>
    </div>
</div>

@endsection 