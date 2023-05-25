@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">

        <div class="form-title">
            <h3>Set value for: <strong>{{ $attribute->name }}</strong></h3>
        </div>
        <form action="{{ url('admin/attribute-values/store', $attribute->id) }}" method="post" class="form">
            <div class="box-body">
                <div class="row">
                    {{ csrf_field() }}
                    <div class="col-md-7">

                        @if($attribute->name == 'Color')
                        <div class="form-group">
                            <label for="value">Enter Color Name <span class="text-danger">*</span></label>
                            <input type="text" name="value" id="value" placeholder="Attribute value" class="form-control" value="{!! old('value')  !!}">
                            <br />
                            <label for="value">Select Color Code <span class="text-danger">*</span></label>
                            <input type="color" name="code" id="code" />
                        </div>
                        @else
                        <div class="form-group">
                            <label for="value">Attribute value <span class="text-danger">*</span></label>
                            <input type="text" name="value" id="value" placeholder="Attribute value" class="form-control" value="{!! old('value')  !!}">
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-5">
                        <div class="form-title">
                            <h3>Saved Values</strong></h3>
                        </div>
                        <div class="colorCodes">
                            <ul>
                                @if(count($values)>0)
                                @foreach($values as $val)
                                <li style="margin-top: 10px">{{ $val->value ?? '' }}  {{ $val->code ?? '' }}</li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.attributes.index') }}" class="btn btn-default btn-sm">Back</a>
                    <button type="submit" class="btn btn-primary btn-sm" id="saveAttribute">Create</button>
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
    // $('#saveAttribute').on('click', function() {
    //     let value = $('#value').val();
    //     let code = $('#code').val();

    //     $.ajax({
    //         type: 'POST',
    //         data: {value: value, code: code},
    //         url: '/admin/attribute-values/store/<?php echo $attribute->id; ?>',
    //         success: function(data){
    //             window.location.reload();
    //         }
    //     })
    // })
</script>

@endsection