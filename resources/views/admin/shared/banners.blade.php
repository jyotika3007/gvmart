@if($banners)
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th >Created At</th>
            <th>Title</th>
            <th>Category</th>
            <th>Cover</th>
            <th>Priority</th>
            <th>Status</th>
            <!-- <th>Date</th> -->
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($banners as $banner)
        
        <?php
        $categopry = "";
        if(!empty($banner->category_id))
        $category =  DB::table('categories')->where('id',$banner->category_id)->first();
    ?>
            <tr>
                <td>{{ date('M d, Y',strtotime(explode(' ',$banner->created_at)[0])) }}</td>
                <td>
                        <a href="{{ route('admin.banners.show', $banner->id) }}">{{ $banner->banner_title }}</a>
                   
                </td>
                <td>{{ $category->name ?? '' }}</td>
                <td><img src="{{ asset('storage/'.$banner->cover) }}" alt="" class="img-responsive" style="height: 75px;"></td>
                <td>{{ $banner->priority }}</td>
                <td>@include('layouts.status', ['status' => $banner->status])</td>
               
                <td>
                    <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <div class="btn-group">

                            <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                            
                            <!-- <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button> -->
                            

                            </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif