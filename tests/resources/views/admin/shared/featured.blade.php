<label for="is_featured">Featured </label>
<select name="is_featured" id="is_featured" class="form-control select2">
    <option value="0" @if($featured == 0 || old('featured') == 0) selected="selected" @endif>No</option>
    <option value="1" @if($featured == 1 || old('featured') == 1) selected="selected" @endif>Yes</option>
</select>	