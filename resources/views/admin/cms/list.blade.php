@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if(!$cms->isEmpty())
            <div class="box">
                <div class="box-body">
                    <h3>CMS </h3>
                    <br>
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Page</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($cms as $page)
                            <tr>
                                <td></td>
                                <td>
                                    <a href="{{ route('admin.cms.show', $page->id) }}">{{ $page->title ?? '' }}</a>
                                </td>

                                <td>
                                    <a href="{{ route('admin.cms.show', $page->id) }}">{{ substr($page->description ?? '',0,100) }}...</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.cms.destroy', $page->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.cms.edit', $page->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $cms->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @else
            <p class="alert alert-warning">No page created yet. <a href="{{ route('admin.cms.create') }}">Create one!</a></p>
        @endif
    </section>
    <!-- /.content -->
@endsection
