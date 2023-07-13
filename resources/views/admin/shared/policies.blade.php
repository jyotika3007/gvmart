@if(!$policies->isEmpty())
    <table class="table">
        <thead>
        <tr>
            <td class="col-md-2" >ID</td>
            <td class="col-md-2">Request Type</td>
            <td class="col-md-2">Reason</td>
            <td class="col-md-2">Status</td>
            <td class="col-md-2">Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($policies as $policy)
            <tr>
                <td>{{ $policy->id }}</td>
                <td>
                        {{ ucfirst($policy->request_type) }}
                </td>
                <td>
                        <a href="{{ route('admin.blogs.show', $policy->id) }}">{{ $policy->reason }}</a>
                   
                </td>
                
                <td>@include('layouts.status', ['status' => $policy->status])</td>
                <td>
                  
                            <a href="{{ route('admin.policies.edit', $policy->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                            
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif