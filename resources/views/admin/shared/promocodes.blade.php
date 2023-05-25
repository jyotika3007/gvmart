@if($promocodes)
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>Promocode Name</th>
            <th>Promocode Amount</th>
            <th>Promocode Percent</th>
            <th>Start Date</th>
            <th>Expiry Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($promocodes as $promocode)
        
            <tr>
                <td>{{ $promocode->promocode_name ?? '' }}</td>
                <td>{{ $promocode->promocode_amount ?? '' }}</td>
                <td>{{ $promocode->promocode_percent ?? '' }}</td>
                <td>{{ $promocode->promocode_start_date ?? '' }}</td>
                <td>{{ $promocode->promocode_expiry_date ?? '' }}</td>
                <td>@include('layouts.status', ['status' => $promocode->promocode_status])</td>
                
                <td>
                    <form action="{{ route('admin.promocodes.destroy', $promocode->id) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <div class="btn-group">

                            <a href="{{ route('admin.promocodes.edit', $promocode->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                            
                            <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                            

                            </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif