@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">

        <div class="form-title">
            <h3>Prodiucts >> Add Storage for {{$product->name ?? ''}}</h3>
        </div>

        <div class="box-body">
            
            <div class="row">
                <div class="col-sm-6">
                    
                    <form action="{{ url('admin/variants/update/'.$storage->id) }}" method="post" class="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <br>
                        @php dd($storage) @endphp
                        <div class="row">
                            <div class="form-group">
                                <label for="name">Storage <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $storage->value }}" readonly  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" name="quantity" id="quantity" class="form-control" value="{{ $storage->quantity }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price </label>
                            <input type="text" name="price" id="price" class="form-control" value="{{ $storage->  }}">
                        </div>

                        <div class="form-group">
                            <label for="offer_price">Offer Price </label>
                            <input type="text" name="offer_price" id="offer_price" class="form-control">
                        </div>

                        @include('admin.shared.status-select', ['status' => 1])

                        <div class="box-footer">
                            <div class="btn-group">
                                <a href="{{ url('admin/variants/'.$product_id.'?type=Storage') }}" class="btn btn-default">Back</a>
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