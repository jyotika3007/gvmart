@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">

        <div class="form-title">
            <h3>Prodiucts >> Add Variant</h3>
        </div>

        <div class="box-body">

            <div calss="row">
                <div class="col-sm-6">
                    <form action="{{ url('admin/variants/'.$product_id.'/store?type='.$type) }}" method="post" class="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <br>
                        <div class="row" >
                                <div class="form-group">
                                    <label for="name">Storage <span class="text-danger">*</span></label>
                                    <select name="attribute_value_id" id="attribute_value_id" class="form-control">
                                        <option value="">Select Storage</option>
                                        @foreach($attributes as $attr)
                                        <option value="{{ $attr->id ?? ''}}">{{ $attr->value ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>

                            <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" name="quantity" id="quantity" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price </label>
                                    <input type="text" name="price" id="price" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="offer_price">Offer Price </label>
                                    <input type="text" name="offer_price" id="offer_price" class="form-control">
                                </div>

                                <!-- <div class="form-group">
                                    <label for="cover">Images</label>
                                    <input type="file" name="cover" id="cover" class="form-control" multiple>
                                    <p>To select multiple images, press CTRL + image</p>
                                </div> -->

                                @include('admin.shared.status-select', ['status' => 1])
                            

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="btn-group">
                                <a href="{{ route('admin.brands.index') }}" class="btn btn-default">Back</a>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6"></div>
        </div>

    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection

@section('js')
<script>
  
</script>
@endsection