{{ csrf_field() }}
<div class="form-group">
    <label for="name">Quiz Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') ?? $quiz->name }}"/>
</div>
<button class="btn btn-default">Save</button>
<a href="#" class="btn btn-danger">Cancel</a>
