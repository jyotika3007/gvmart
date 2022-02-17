@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        @include('layouts.errors-and-messages')
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <h2>Shops - Search result for - <b><i>"{{ $keyword }}"</i></b></h2>
        @if($registered_shops)
                @include('layouts.search', ['route' => route('admin.shops.search_shops'), 'placeholder' => 'Search by shop name, owner name ... ', 'keyword' => $keyword])
                <table class="table">
                    <thead>
                        <tr>
                            <td class="col-md-1">ID</td>
                            <td class="col-md-2">Shop Name</td>
                            <td class="col-md-2">Owner</td>
                            <td class="col-md-2">Contact No</td>
                            <td class="col-md-2">Email</td>
                            <td class="col-md-2">Address</td>
                            <td class="col-md-1">Status</td>
                            <td class="col-md-1"></td>
                            <td class="col-md-4">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($registered_shops as $shop)
                    <?php $status=DB::table('users')->where('id',$shop->user_id)->first(); ?>
                        <tr>
                            <td>{{ $shop->id }}</td>
                            <td>{{ $shop->shop_name ?? ''}}</td>
                            <td>{{ $shop->owner_name ?? ''}}</td>
                            <td>{{ $shop->contact ?? ''}}</td>
                            <td>{{ $shop->email ?? ''}}</td>
                            <td>{{ $shop->address ?? ''}}, {{ $shop->city ?? ''}}, {{ $shop->state ?? ''}}, {{ $shop->country ?? ''}} - ({{ $shop->pincode ?? ''}})</td>
                            <td>@include('layouts.status', ['status' => $status->status ?? '0'])</td>
                            <td><a href="{{ route('admin.registered_shops.status-ban', $shop->id) }}" class="btn btn-danger">Ban</a></td>
                            <td>
                                <form action="{{ route('admin.registered_shops.destroy', $shop->id) }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.registered_shops.show', $shop->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                                        <a href="{{ route('admin.registered_shops.edit', $shop->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $registered_shops->links() }}
        @endif
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
