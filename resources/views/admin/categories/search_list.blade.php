@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    <div class="box">
        <div class="box-body">
            <h2>Categories - Search result for <b><i>"{{ $keyword }}"</i></b></h2>
            @include('layouts.search', ['route' => route('admin.categories.search_categories'), 'placeholder' => 'Search by category name ... ' , 'keyword' => $keyword])
   @if(count($categories)>0)
            <table class="table">
                <thead>
                    <tr>
                        <td class="col-md-2">ID</td>
                        <td class="col-md-2">Category Name</td>
                        <td class="col-md-2">Parent</td>
                        <td class="col-md-2">Cover</td>
                        <td class="col-md-3">Status</td>
                        <td class="col-md-3">Actions</td>
                    </tr>
                </thead>
                <tbody>
                   
                    @php $i=1 @endphp
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>
                            <a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a>
                        </td>
                            <td>
                                <?php
                                $parent = DB::table('categories')->where('id',$category->parent_id)->first();
                                ?>
                                {{ $parent->name ?? '' }}</a>
                            </td>
                                <td>
                                    @if(isset($category->cover))
                                    <img src="{{ asset("storage/$category->cover") }}" alt="" class="img-responsive">
                                    @endif
                                </td>
                                <td>@include('layouts.status', ['status' => $category->status])</td>
                                <td>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                    {{ $categories->links() }}
            @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

        @endsection