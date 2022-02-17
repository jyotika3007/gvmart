@if($sliders)
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th >Created At</th>
            <th>Title</th>
            <th>Cover</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($sliders as $slider)
        
            <tr>
                <td>{{ date('M d, Y',strtotime(explode(' ',$slider->created_at)[0])) }}</td>
                <td>
                        <a href="{{ route('admin.sliders.show', $slider->id) }}">{{ $slider->title }}</a>
                   
                </td>
                <td><img src="{{ asset('storage/'.$slider->cover) }}" alt="" class="img-responsive" style="height: 75px;"></td>
                <td>{{ $slider->priority }}</td>
                <td>@include('layouts.status', ['status' => $slider->status])</td>
                <td>
                    @if($slider->end_date < date('Y-m-d')) <p color="red"><b>{{ 'Expired' }}</b></p> @endif
                </td>
                <td>
                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <div class="btn-group">

                            <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            
                            <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                            

                            </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif