@if($products)
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <td>#</td>
            <td style="width: 300px;">Name</td>
            <td>Cover</td>
            <!--<td>Quantity</td>-->
            <td>Price</td>
            <td>Remaining Stock</td>
            <td>Status</td>
            <td>Is Featured</td>
            <td>Is Trending</td>
            <td>Is Best Seller</td>
            <td>Is Top  Rated</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <!--<td>{{ $product->id }}</td>-->
                <td></td>
                <td>
                    
                        <a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a>
                    
                </td>
                <td>
                    @if(!empty($product->cover))
                    <img src="{{ asset('storage/'.$product->cover ?? '') }}" style="height: 50px; width: auto">
                @endif
            </td>
                <!--<td>{{ $product->quantity }}</td>-->
                <td>{{ config('cart.currency') }} {{ $product->price }}</td>
                <td>{{ $product->stock_quantity }}</td>
                <td>@include('layouts.status', ['status' => $product->status])</td>
                <td>@include('layouts.status', ['status' => $product->is_featured])</td>
                <td>@include('layouts.status', ['status' => $product->is_trending])</td>
                <td>@include('layouts.status', ['status' => $product->is_best_seller])</td>
                <td>@include('layouts.status', ['status' => $product->is_top_rated])</td>
                <td>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <div class="btn-group">
                           <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif