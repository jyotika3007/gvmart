@if($preLaunchProducts)
<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <td>Sku</td>
            <td>Name</td>
            <td>Prelaunch Price</td>
            <td>Cover</td>
            <td>Storage</td>
            <td>Status</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($preLaunchProducts as $product)
        <tr>
            <td>
            {{ $product->sku ?? '' }}
            </td>
            <td>
                <a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name ?? ''}}</a>
            </td>
            <td>
            {{ $product->prelaunch_price ?? ''}}
            </td>
            <td>
                @if(!empty($product->cover) && $product->cover!='')
                <img src="{{ asset('storage/'.$product->cover ?? '') }}" style="height: 50px; width: auto">
                @endif
            </td>
            <td>
                <a href="{{ url('admin/variants/'.$product->id.'?type=Storage' ) }}" class="btn btn-success btn">Add</a>
            </td>
            <td>@include('layouts.status', ['status' => $product->status])</td>
            <td>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                    <div class="btn-group">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="launchProduct({{ $product->id }})"><i class="fa fa-trash"></i></a>
                        <!-- <a href="{{ url('admin/launchProduct/'.$product->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif


@section('js')
<script>
    function launchProduct(id){
        let conf = confirm('Once you launch the product, email will send to users for payment. So before launching the product, update all the details like product price. Do you want to launch this product ?')
    }
</script>
@endsection