    <div class="form-group">
    	<label for="category">Shop Category </label>
    	<select name="category" id="get_category" class="form-control select2" required="required" onchange="getService()" style="display: none;">
    		<option value="">Select shop Category</option>
    		<option value="Product Based" @if($category == "Product Based" || old('category') == 0) selected="selected" @endif >Product Based</option>
    		<option value="Service Based" @if($category == "Service Based" || old('category') == 1) selected="selected" @endif >Service Based</option>
    	</select>
    </div>