<label for="is_top_rated">Add To Top Rated </label>
<select name="is_top_rated" id="is_top_rated" class="form-control select2">
    <option value="0" @if($is_top_rated == 0 || old('is_top_rated') == 0) selected="selected" @endif>No</option>
    <option value="1" @if($is_top_rated == 1 || old('is_top_rated') == 1) selected="selected" @endif>Yes</option>
</select>	