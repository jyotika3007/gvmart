

@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        
            <div class="box">
                <div class="box-body">
                    
                     <h3>Newsletter Posts @if(!empty($keyword))  - Search result for - <b><i>"{{ $keyword }}"</i></b> @endif </h3>

                    <br>

                    <form action="{{url('admin/newsletter_posts/search_complaints')}}" method="get">
                    <div class="row"  >
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label style="margin-top: 6px; float: right;">Search Here</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="keyword" id="keyword" value="@if(!empty($keyword)){{$keyword}}@endif" class="form-control" placeholder="Search by  title ...">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-4">
                            <button type="submit" name="search" id="search" vaule="search" class="btn btn-primary">Submit</button>
                            <a href="{{ url('admin/newsletter_posts/index') }}" name="search" id="reset" vaule="reset" class="btn btn-warning">Reset</a>
                        </div>

                        <div class="col-sm-2">
                            <a href="{{ url('admin/newsletter_posts/create') }}" name="search" id="reset" vaule="reset" class="btn btn-success">Add New Post</a>
                        </div>
                        
                    </div>
                </form>
                    <br>
        @if($newsletters)
                    <table class="table table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <!-- <th>Category Type</th> -->
                                <th>Title</th>
                                <th>Cover</th>
                                
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp 
                        @foreach ($newsletters as $news)
                        
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $news->post_title ?? '' }}</td>
                                
                                <td>
                                    @if( $news->cover != '' )<img src="{{ asset('storage/'.$news->cover) }}" style="height: 75px;"> @endif
                                </td>
                                <td> 
                                    <a href="{{ url('admin/newsletter_posts/'.$news->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    @if($news->mail_sent == 0)
                                    <a href="{{ url('admin/newsletter_posts/'.$news->id.'/send') }}" class="btn btn-success"> Send</a>
                                    @else
                                    <a href="{{ url('admin/newsletter_posts/'.$news->id.'/send') }}" class="btn btn-success"> Resend</a>
                                    @endif
                                </td> 
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    {{ $newsletters->links() }}
            @else
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif
    </section>
    <!-- /.content -->
@endsection
