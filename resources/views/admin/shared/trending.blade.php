<label for="is_trending">Add To New Arrival </label>
<select name="is_trending" id="is_trending" class="form-control select2">
    <option value="0" @if($trending == 0 || old('trending') == 0) selected="selected" @endif>No</option>
    <option value="1" @if($trending == 1 || old('trending') == 1) selected="selected" @endif>Yes</option>
</select>	