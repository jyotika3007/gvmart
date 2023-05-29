<label for="show_to_footer">Show to Footer </label>
<select name="show_to_footer" id="show_to_footer" class="form-control select2">
    <option value="1" @if($status == 1) selected="selected" @endif>Enable</option>
    <option value="0" @if($status == 0) selected="selected" @endif>Disable</option>
</select>