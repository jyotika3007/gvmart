<label for="is_prelaunched">Add To Prelaunch </label>
<select name="is_prelaunched" id="is_prelaunched" class="form-control select2">
    <option value="0" @if($is_prelaunched == 0 || old('is_prelaunched') == 0) selected="selected" @endif>No</option>
    <option value="1" @if($is_prelaunched == 1 || old('is_prelaunched') == 1) selected="selected" @endif>Yes</option>
</select>	