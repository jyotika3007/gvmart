@if($preLaunchProducts)
<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <td>Sku</td>
            <td>Name</td>
            <td>Prelaunch Price</td>
            <td>Cover</td>
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
            <td>@include('layouts.status', ['status' => $product->status])</td>
            <td>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                    <div class="btn-group">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="{{ url('admin/launchProduct/'.$product->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trace"></i></a>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif