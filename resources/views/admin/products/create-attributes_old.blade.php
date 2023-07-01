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
                    <form action="{{ route('admin.brands.store') }}" method="post" class="form" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <br>
                        <div class="row" style="border-radius: 5px; border: 1px solid #f0f0f0; padding: 10px" id="attribute0">
                            <div class="col-sm-9">

                                <div class="form-group">
                                    <label for="name">Select Attribute <span class="text-danger">*</span></label>
                                    <select name="attribute_id" id="attribute_id" class="form-control">
                                        <option value="">Select Attribute</option>
                                        @foreach($attributes as $attr)
                                        <option value="{{ $attr->id ?? ''}}">{{ $attr->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="value">Attribute Value </label>
                                    <input type="text" name="value" id="value" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <br />
                                <br />
                                <button type="button" class="btn btn-primary" onclick="addNewRow()">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div calss="row">

                            <div id="moreAttributes">
                                </div>
                            </div>

                            <div class="row">
                                <br/>
                            <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" name="quantity" id="quantity" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price </label>
                                    <input type="text" name="price" id="price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cover">Images</label>
                                    <input type="file" name="cover" id="cover" class="form-control" multiple>
                                    <p>To select multiple images, press CTRL + image</p>
                                </div>
                                @include('admin.shared.status-select', ['status' => 1])
                            </div>

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
    var id = 1

    function addNewRow() {

        let options = '';
        $.ajax({

            url: '/admin/productVariants',
            type: 'GET',
            success: function(result) {
                for (i = 0; i < result.length; i++) {
                    options += `<option value="${result[i].id}">${result[i].name}</option>`
                }

                let html = `<div class="row" style="border-radius: 5px; border: 1px solid #f0f0f0; padding: 10px" id="attribute${id}">
                            <div class="col-sm-9">

                                <div class="form-group">
                                    <label for="name">Select Attribute <span class="text-danger">*</span></label>
                                    <select name="attribute_id" id="attribute_id" class="form-control">
                                        <option value="">Select Attribute</option>
                                        ${options}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="value">Attribute Value </label>
                                    <input type="text" name="value[]" id="value" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <br />
                                <br />
                                <button type="button" class="btn btn-danger" onclick="removeRow(${id})">
                                    <i class="fa fa-close"></i>
                                </button>
                            </div>
                        </div>`;
                $('#moreAttributes').append(html)

            }
        })



    }

    function removeRow(rm_id) {
        $('#attribute' + rm_id).remove();
    }
</script>
@endsection