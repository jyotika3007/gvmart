@if(!$blogs->isEmpty())
    <table class="table">
        <thead>
        <tr>
            <td class="col-md-2" >ID</td>
            <td class="col-md-2">Author</td>
            <td class="col-md-2">Title</td>
            <td class="col-md-2">Cover</td>
            <td class="col-md-2">Status</td>
            <td class="col-md-2">Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($blogs as $blog)
            <tr>
                <td>{{ $blog->id }}</td>
                <td>
                        {{ ucfirst($blog->author) }}
                </td>
                <td>
                        <a href="{{ route('admin.blogs.show', $blog->id) }}">{{ $blog->title }}</a>
                   
                </td>
                <td>
                    @if(!empty($blog->cover))
                    <img src="{{ asset('storage/'.$blog->cover) }}" alt="" class="img-responsive" style="height: 150px;">
                    @endif
                </td>
                <td>@include('layouts.status', ['status' => $blog->status])</td>
                <td>
                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <div class="btn-group">

                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                            
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                            

                            </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif