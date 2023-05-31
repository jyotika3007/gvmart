<label for="is_prelaunched">Is Prelaunched </label>
<select name="is_prelaunched" id="is_prelaunched" class="form-control select2">
    <option value="1" @if($is_prelaunched == 1) selected="selected" @endif>Enable</option>
    <option value="0" @if($is_prelaunched == 0) selected="selected" @endif>Disable</option>
</select>
