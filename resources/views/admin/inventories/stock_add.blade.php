<div class="stocks row" id="stock_div{{ $id }}">

<div class="col-sm-4">
                 <div class="form-group">
                    <label for="product_ids">Select Product</label>
                    <select name="product_ids[]" id="product_ids" class="form-control select2">
                        <option value="">None</option>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        
                <!-- <div class="col-sm-3">
                 <div class="form-group">
                    <label for="product_sku">Product SKU</label>
                    <input type="text" name="product_sku[]" id="product_sku" placeholder="Product SKU" class="form-control" value="" required="required">
                </div>
            </div> -->
        
                <div class="col-sm-3">
                 <div class="form-group">
                    <label for="product_quantity">Product Quantity</label>
                    <input type="text" name="product_quantity[]" id="product_quantity" placeholder="Product Quantity" class="form-control" value="">
                </div>
            </div>
        
                <div class="col-sm-3">
                 <div class="form-group">
                    <label for="product_price">Total Amount</label>
                    <input type="text" name="product_price[]" id="product_price" placeholder="Total Amount" class="form-control" value="">
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <br>
                    <a onclick="removeDiv({{$id}})" class="btn btn-danger">-</a>
                </div>
            </div>
        </div>