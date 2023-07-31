@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">

        <div class="form-title">
            <h3>Banners >> Add Banner</h3>
        </div>

        <form action="{{ route('admin.banners.store') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="col-md-8">

                    <div class="form-group">
                        <label for="category_id">Select Category <span class="text-danger">*</span></label>
                        <select name="category_id" id="category_id" placeholder="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ ucfirst($cat->name ?? '') }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_id">Select Product <span class="text-danger">*</span></label>
                        <select name="product_id" id="product_id" placeholder="product_id" class="form-control" required>
                            <option value="">Select Product</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="banner_title">Title </label>
                        <input type="text" name="banner_title" id="banner_title" placeholder="Title" class="form-control" value="" required="required">
                    </div>

                    <div class="form-group">
                        <label for="store_offer">Offer </label>
                        <div class="row">
                            <div class="col-sm-4" style="padding: 0">
                                <input type="text" name="store_offer" id="store_offer" placeholder="Offer" class="form-control" value="" required="required" style="width: 95%">
                            </div>
                            <div class="col-sm-4" style="padding: 0">
                                <select name="store_offer_type" class="form-control">
                                    <option> Select Type </option>
                                    <option value="Flat">Flat</option>
                                    <option value="Percent">Percent (%)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="priority">Display Priority </label>
                        <input type="number" name="priority" id="priority" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <label for="cover">Image </label>
                        <input type="file" name="cover" id="cover" class="form-control" required="required">
                    </div>


                    @include('admin.shared.status-select', ['status' => 1])

                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.banners.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
@endsection


@section('js')
<script>
    $('#category_id').on('change', function() {
        let cat_id = $('#category_id').val();
        $.ajax({
            url: '/admin/getCategoryProducts',
            type: 'GET',
            data: {
                category_id: cat_id
            },
            success: function(response) {
                console.log(response)
                let options = '<option value=""> Select Product </option>';
                if (response.length > 0) {
                    response.forEach(itm => {
                        options += `<option value="${itm.id}">${itm.name}</option>`;
                    });
                    $('#product_id').html(options);
                }
            }
        })
    })
</script>
@endsection