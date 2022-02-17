

@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <style>

        h4{
            font-weight: bold;
            margin-bottom: 25px;
        }

    </style>
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        
            <div class="box">
                <div class="box-body">
                    
                     <h3>Customers WishList Products @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>

                     <div class="col-sm-12">
                        <div class="col-sm-4">
                     <h4>Customer Name : {{ $user->name ?? '' }}</h4>
</div>
                        <div class="col-sm-4">
                     <h4>Customer Email : {{ $user->email ?? '' }}</h4>
</div>
                        <div class="col-sm-4">
                     <h4>Customer Mobile : {{ $user->mobile ?? '' }}</h4>
</div>
</div>
                    <br>

                    
                    <br>
        @if($products)
                    <table class="table table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <!-- <th>Category Type</th> -->
                                <th>Product Name</th>
                                <th>Product SKU</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp 
                        @foreach ($products as $list)
                        
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $list->name ?? '' }}</td>
                                <td>{{ $list->sku?? '' }}</td>
                                
                                
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    
            @else
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif
    </section>
    <!-- /.content -->
@endsection
