<div class="form-group">
    @switch($question->answer_type_id)
        @case(0)
        <div class="radio">
            <label for="answer">
                <input type="radio" name="answer[{{ $question->id }}]" value="1">
                Yes
            </label>
            <label for="answer">
                <input type="radio" name="answer[{{ $question->id }}]" value="0">
                No
            </label>
        </div>
        @break
        @case(1)
        <input type="text" class="form-control" name="answer[{{ $question->id }}]">
        @break
        @case(2)
        <select name="answer[{{ $question->id }}]" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        @break
    @endswitch
</div>