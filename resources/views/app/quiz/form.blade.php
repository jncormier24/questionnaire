{{ csrf_field() }}
<div class="form-group">
    <label for="name">Quiz Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') ?? $quiz->name }}"/>
</div>
<div class="form-group">
    <label for="quiz_category_id">Quiz Category</label>
    <select class="form-control" name="quiz_category_id">
        @foreach($quizCats as $quizCat) 
            <option value="{{ $quizCat->id }}">{{ $quizCat->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <button class="btn btn-default">Save</button>
    <a href="{{ route('admin.quiz.index') }}" class="btn btn-danger">Cancel</a>
</div>

@include('app.partials._formerror')