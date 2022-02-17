<label for="is_best_seller">Add To Top Rated </label>
<select name="is_best_seller" id="is_best_seller" class="form-control select2">
    <option value="0" @if($is_best_seller == 0 || old('is_best_seller') == 0) selected="selected" @endif>No</option>
    <option value="1" @if($is_best_seller == 1 || old('is_best_seller') == 1) selected="selected" @endif>Yes</option>
</select>	