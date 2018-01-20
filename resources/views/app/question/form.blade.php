{{ csrf_field() }}

<div class="form-group">
    <div class="field">
        <label for="text">Question</label>
        <textarea class="form-control" name="text">{{ old('text') ?? $question->text }}</textarea>
    </div>
    <div class="field">
        <label for="notes">Notes</label>
        <textarea class="form-control" name="notes">{{ old('notes') ?? $question->notes }}</textarea>
    </div>
</div>
<div class="form-group">
    <button class="btn btn-success">Save</button>
    <a href="/question" class="btn btn-danger">Cancel</a>
</div>

@include('app.partials._formerror')