@extends('layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container">

    	@include('layout.slide')

        <div class="space20"></div>


        <div class="row main-left">
           @include('layout.menu')

            <div class="col-md-9">
	            <div class="panel panel-default" style="margin-left:-135px; margin-top:-10px;width:1087px;">
	            	<div class="panel-heading" style="background-color:#609810; border-color:white; color:white; font-size:18px;font-weight:bold;" >
	            		<h4 style="margin-top:0px; margin-bottom:0px; height:20px">Thông tin tuyển sinh</h4>
	            	</div>

	            	<div class="entry-content" >
                        <h1>Bạn chưa đăng ký hồ sơ</h1>

	                </div><!-- .entry-content -->


	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection
