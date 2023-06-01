@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">

    @include('layouts.errors-and-messages')
    <div class="box">
        <div class="form-title">
            <h3>Products >> Add Images for {{ $product->name ?? '' }}</h3>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-sm-6">

                    <form action="{{ url('admin/colors/'.$product_id.'/store-image/'.$color_id.'?type=Color&type_id='.$type_id) }}" method="post" class="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <br>

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
                    <br /><br />
                </div>

                <div class="col-sm-6">

                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Image</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($images)>0)
                            @php $i=1 @endphp
                            @foreach($images as $img)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$img->src) }}" style="height: 100px" />
                                </td>
                                <td>@include('layouts.status', ['status' => $img->status])</td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>

                </div>
            </div>
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