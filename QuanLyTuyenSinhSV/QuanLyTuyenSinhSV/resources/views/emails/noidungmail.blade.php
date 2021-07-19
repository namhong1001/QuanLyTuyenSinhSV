<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Mail</title>
    <base href="{{asset('')}}">

    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>
<body>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $item)
                                {{$item}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
    <h3 style="text-align:center;">Danh sách email trúng tuyển</h3>
    <table style="margin-top: 50px; width:850px;height:auto;margin: 0 auto;" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th><p style="text-align:center;">Họ tên</p></th>
                            <th><p style="text-align:center;"></p>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tt as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->hoten}}</td>
                                <td>{{$item->email}}</td>
                            </tr>
                        @endforeach

                        @foreach ($kq as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->hoten}}</td>
                                <td>{{$item->email}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

    <form action="noidungmail" method="POST" style="margin:20px auto;width:850px;height:auto;margin-left:36%;">

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <textarea rows="9" cols="70" placeholder="Hãy nhập nội dung thông báo trúng tuyển" name="tbtt">

            </textarea></br>


        <a style="margin-left:45px;">Thông tin này sẽ được gửi vào mail của tất cả sinh viên trúng tuyển</a></br>
        <button type="submit" class="btn btn-default" style="margin-left:210px;">Gửi mail</button>
    </form>

    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
</body>
</html>

