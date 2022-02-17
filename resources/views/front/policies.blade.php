@extends('layouts.front.app')

@section('content')


 <div class="breadcrumb-area mb-50">
        <div class="container-fluid" style="margin: 0 5%; width: 90%;">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">{{ $pageName }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section section mb-50">
        <div class="container-fluid" style="width: 90%; margin: 0 5%">
            <div class="row">
                <div class="col-12">
                	<h3>GV Mart - {{ $content->title }}</h3>
                	<br>
                	<p>
                		<?php
                		echo $content->description ?? '';
                		?>
                	</p>
                </div>
            </div>
        </div>
    </div>





@endsection