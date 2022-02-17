<div class="sizes row" id="weights_div{{ $id }}">
                          <div class="col-sm-2">
                        <label for="size">Unit </label>
                            <select type="text" name="units[]" id="units" class="form-control">
                                <option value="Grams">Grams</option>
                                <option value="Kg">KiloGrams</option>
                                <option value="ML">ML</option>
                                <option value="L">L</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                        <label for="weight">Weight </label>
                            <input type="text" name="weights[]" id="weights" placeholder="Weight" class="form-control" value="">
                        </div>
                        <div class="col-sm-4">
                            <label for="weight_prices">Price </label>
                            <input type="number" name="weight_prices[]" id="weight_price" placeholder="Price" class="form-control" value="">
                        </div>
                        <div class="col-sm-2">
                            <br>
                            <button type="button" onclick="removeWeightDiv({{$id}})" class="btn btn-danger">Remove </button>
                        </div>
                    </div>