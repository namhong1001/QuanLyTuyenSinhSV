<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hệ thống quản lý tuyển sinh</title>

    <base href="{{asset('')}}">

    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container" style="width:800px;margin-left:200px;">

    	<!-- slider -->
    	<div class="row">

            <div class="col-md-6 col-md-offset-4">
                <div class="panel panel-default">
                <div class="loginbox-social">
                    <div class=" logo">
                        <img id="logo" style="vertical-align: middle; margin-left:55px;margin-top:30px;" src="http://kpis.dlu.edu.vn/Images/logo_DLU.png" />
                    </div>
                    <div class="social-title " style="padding-top:10px;color:black;text-align:center;">Đăng ký tài khoản</div>
                </div>
                <div class="loginbox-or" style="position: relative;text-align: center;height: 20px;margin-top:20px;">
                    <div class="or-line" ></div>
                    <div class="or">----***----</div>
                </div>
				  	<div class="panel-body">
                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $er)
                                {{$er}}.'<br>'
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
				    	<form action="signin" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Nhập họ tên" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Nhập email" name="email" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>
							<div>
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="passwordAgain" placeholder="Nhập lại mật khẩu" aria-describedby="basic-addon1">
							</div>
							<br>
							<button style="text-align: center;width: 100%;  color:white; background-color:rgb(61, 196, 61);" type="submit" class="btn btn-default">Đăng ký
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
    <!-- end Page Content -->


    <!-- jQuery -->
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

</body>

</html>
