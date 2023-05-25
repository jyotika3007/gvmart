<label for="status">Status </label>
<select name="status" id="status" class="form-control select2">
    <option value="1" @if($status == 1) selected="selected" @endif>Enable</option>
    <option value="0" @if($status == 0) selected="selected" @endif>Disable</option>
</select>
