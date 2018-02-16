<div class="form-group">
    <div class="field">
        <label for="text">Question</label>
        <textarea class="form-control" name="text">{{ old('text') ?? $question->text }}</textarea>
    </div>
    <div class="field">
        <label for="notes">Notes</label>
        <textarea class="form-control" name="notes">{{ old('notes') ?? $question->notes }}</textarea>
    </div>
    <div class="field">
        <label for="answer_type_id">Answer Type</label>
        <select class="form-control" name="answer_type_id">
            @foreach(\App\Question::ANSWERTYPES as $key => $text)
                <option value="{{ $key }}" {{ $question->answer_type_id == $key ? 'selected' : ''}}>{{ $text }}</option>
            @endforeach
        </select>
    </div>
    <div class="field">
        <label for="quiz_id">Answer Type</label>
        <select class="form-control" name="quiz_id">
            @foreach($quizzes as $quiz)
                <option value="{{ $quiz->id }}" {{ $question->quiz_id == $quiz->id ? 'selected' : ''}}>{{ $quiz->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <button class="btn btn-success">Save</button>
    <a href="{{ route('admin.question.index') }}" class="btn btn-danger">Cancel</a>
</div>

@include('app.partials._formerror')