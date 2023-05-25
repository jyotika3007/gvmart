@if(!$testimonials->isEmpty())
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th>Created At</th>
            <th>Name</th>
            <th>Profession</th>
            <th>Cover</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($testimonials as $test)
        <tr>
            <td>{{ date('M d, Y',strtotime(explode(' ',$test->created_at)[0])) }}</td>
            <td>
                <a href="{{ route('admin.testimonials.show', $test->id) }}">{{ $test->name }}</a>

            </td>
            <td>
                {{ ucfirst($test->profession) }}
            </td>
            <td>
                @if(!empty($test->cover))
                <img src="{{ asset('storage/'.$test->cover) }}" alt="" class="img-responsive" style="height: 75px;">
                @endif
            </td>
            <td>@include('layouts.status', ['status' => $test->status])</td>
            <td>
                <form action="{{ route('admin.testimonials.destroy', $test->id) }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                    <div class="btn-group">

                        <a href="{{ route('admin.testimonials.edit', $test->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                        
                        <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                        

                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif