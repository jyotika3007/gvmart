<div class="sizes row" id="sizes_div{{ $id }}">
                        <div class="col-sm-5">
                        <label for="size">Size </label>
                            <input type="text" name="size[]" id="size" placeholder="Size" class="form-control" value="{{ old('size') }}">
                        </div>
                        <div class="col-sm-5">
                            <label for="size">Price </label>
                            <input type="number" name="product_prices[]" id="product_prices" placeholder="Size" class="form-control" value="{{ old('size') }}">
                        </div>
                        <div class="col-sm-2">
                            <br>
                            <button type="button" onclick="removeDiv({{$id}})" class="btn btn-danger">Remove </button>
                        </div>
                    </div>