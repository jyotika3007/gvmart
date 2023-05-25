@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <h2>Sub Admins - Search result for <b><i>"{{ $keyword }}"</i></b></h2>

                     @include('layouts.search', ['route' => route('admin.subadmins.search_subadmins'), 'placeholder' => 'Search by subadmins name, email name ... ' , 'keyword' => $keyword])
        @if($subadmins)

        <table class="table">
                        <thead>
                            <tr>
                                <td class="col-md-2">ID</td>
                                <td class="col-md-2">Name</td>
                                <td class="col-md-2">Email</td>
                                <td class="col-md-2">Status</td>
                                <td class="col-md-4">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($subadmins as $subadmin)
                            <tr>
                                <td>{{ $subadmin['id'] }}</td>
                                <td>{{ $subadmin['name'] }}</td>
                                <td>{{ $subadmin['email'] }}</td>
                                <td>@include('layouts.status', ['status' => $subadmin['status']])</td>
                                <td>
                                    <form action="{{ route('admin.subadmins.destroy', $subadmin['id']) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.subadmins.show', $subadmin['id']) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                                            <a href="{{ route('admin.subadmins.edit', $subadmin['id']) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $subadmins->links() }}
        @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection