<label for="is_top">Add To Top Category </label>
<select name="is_top" id="is_top" class="form-control select2">
    <option value="0" @if($top == 0 || old('top') == 0) selected="selected" @endif>No</option>
    <option value="1" @if($top == 1 || old('top') == 1) selected="selected" @endif>Yes</option>
</select>	