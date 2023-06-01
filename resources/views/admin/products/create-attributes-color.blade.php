@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <div class="form-title">
            <h3>Prodiucts >> Add Color for {{ $product->name ?? '' }}</h3>
        </div>
        
        <div class="box-body">
            
            <div class="row">
                <div class="col-sm-6">
                    
                    <form action="{{ url('admin/colors/'.$product_id.'/store?type='.$type.'&type_id='.$type_id) }}" method="post" class="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label for="name">Color <span class="text-danger">*</span></label>
                                <select name="attribute_value_id" id="attribute_value_id" class="form-control" required>
                                    <option value="">Select Color</option>
                                    @foreach($attributes as $attr)
                                    <option value="{{ $attr->id ?? ''}}">{{ $attr->value ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" name="images[]" id="images" class="form-control" multiple required>
                            <p>To select multiple images, press CTRL + image</p>
                        </div>

                        @include('admin.shared.status-select', ['status' => 1])

                        <div class="box-footer">
                            <div class="btn-group">
                                <a href="{{ url('admin/colors/'.$product_id.'?type=Color&type_id='.$type_id) }}" class="btn btn-default">Back</a>
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