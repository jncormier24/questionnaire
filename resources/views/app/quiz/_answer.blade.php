<div class="form-group">
    @switch($question->answer_type_id)
        @case(0)
        <div class="radio">
            <label>
                <input type="radio" name="answer[]" value="1">
                Yes
            </label>
            <label for="answer">
                <input type="radio" name="answer[]" value="0">
                No
            </label>
        </div>
        @break
        @case(1)
        <input type="text" class="form-control" name="answer[]">
        @break
        @case(2)
        <select name="answer[]" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        @break
    @endswitch
</div>