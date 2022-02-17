

@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if(count($shop_categories)>0)
        
            <div class="box">
                <div class="box-body">
                    <h2>Shop Categories</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <!-- <td>Category Type</td> -->
                                <td>Category Name</td>
                                <!-- <td>Cover</td> -->
                                <!-- <td>Featured</td> -->
                                <td>Status</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($shop_categories as $shop_category)
                            <tr>
                                <td>{{ $shop_category->id ?? '' }}</td>
                                <!-- <td>
                                    <a href="{{ route('admin.shop_categories.show', $shop_category->id) }}">{{ $shop_category->category ?? '' }}</a>
                                </td> -->
                                <td>{{ $shop_category->category_name ?? '' }}</td>
                                <!-- <td><img src="{{ asset('storage/'.$shop_category->cover ?? '') }}" height='100px'></td> -->
                                <!-- <td>@include('layouts.status', ['status' => $shop_category->featured])</td> -->
                                <td>@include('layouts.status', ['status' => $shop_category->status])</td>
                
                                <td>
                                    <form action="{{ route('admin.shop_categories.destroy', $shop_category->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.shop_categories.edit', $shop_category->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $shop_categories->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @else
            <p class="alert alert-warning">No brand created yet. <a href="{{ route('admin.shop_categories.create') }}">Create one!</a></p>
        @endif
    </section>
    <!-- /.content -->
@endsection
