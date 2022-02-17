@if(!$sliders->isEmpty())
    <table class="table">
        <thead>
        <tr>
            <td class="col-md-2" >ID</td>
            <td class="col-md-3">Title</td>
            <td class="col-md-2">Cover</td>
            <td class="col-md-2">Priority</td>
            <td class="col-md-2">Status</td>
            <td class="col-md-2">Date</td>
            <td class="col-md-3">Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($sliders as $slider)
        
            <tr>
                <td>{{ $slider->id }}</td>
                <td>
                        <a href="{{ route('admin.sliders.show', $slider->id) }}">{{ $slider->title }}</a>
                   
                </td>
                <td><img src="{{ asset('storage/'.$slider->cover) }}" alt="" class="img-responsive"></td>
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
                            
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                            

                            </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif