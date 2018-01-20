{{ csrf_field() }}
<div class="form-group">
    <label for="name">Quiz Category Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') ?? $quizcategory->name }}"/>
</div>
<div class="form-group">
    <button class="btn btn-success">Save</button>
    <a href="/quizcategory" class="btn btn-danger">Cancel</a>
</div>

@include('app.partials._formerror')