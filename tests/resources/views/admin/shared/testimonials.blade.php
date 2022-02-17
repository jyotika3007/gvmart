@if(!$testimonials->isEmpty())
    <table class="table">
        <thead>
        <tr>
            <td class="col-md-2" >ID</td>
            <td class="col-md-2">Name</td>
            <td class="col-md-2">Profession</td>
            <td class="col-md-2">Cover</td>
            <td class="col-md-2">Status</td>
            <td class="col-md-2">Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($testimonials as $test)
            <tr>
                <td>{{ $test->id }}</td>
                <td>
                        <a href="{{ route('admin.testimonials.show', $test->id) }}">{{ $test->name }}</a>
                   
                </td>
                 <td>
                        {{ ucfirst($test->profession) }}</td>
                <td>

                <img src="{{ asset('storage/'.$test->cover) }}" alt="" class="img-responsive" style="height: 75px;">
            </td>
                <td>@include('layouts.status', ['status' => $test->status])</td>
                <td>
                    <form action="{{ route('admin.testimonials.destroy', $test->id) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <div class="btn-group">

                            <a href="{{ route('admin.testimonials.edit', $test->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                            

                            </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif