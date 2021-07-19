<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hệ thống tuyển sinh trực tuyến</title>
    <base href="{{asset('')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap Core CSS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="/sinhvien_asset/css/shop-homepage.css" rel="stylesheet">
    <link href="/sinhvien_asset/css/my.css" rel="stylesheet">

</head>

<body>



<div style="margin-left:330px;margin-top:-50px;" id="page-wrapper">
    <div class="col-lg-12">
        <h1 class="page-header">Chỉnh sửa hồ sơ
            {{-- <small>Duyệt hồ sơ</small> --}}
        </h1>
    </div>
    <form action="chinhsuahoso/{{$hoso->mahoso}}" method="POST" name="chinhsuahoso" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
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

        @if(session('loi'))
        <div class="alert alert-success">
            {{session('loi')}}
        </div>

        @endif

        <div id="container">

            <div id="content">
            <div>
            <div class="img" style="width:115px;height:140px;float:left;">
                <img style="width:100px; height:150px" src="upload/hoso/{{$hoso->hinhanh}}">

            </div>
        </div>
        <p style="margin-top:20px;"><b>A. THÔNG TIN CÁ NHÂN</b></p>
                <p style="width:450px;"><b>1. Họ, chữ đệm và tên của thí sinh</b></p>
            </div>
            <table class="infomation">
                <tr>
                    <td><input style="width: 450px; margin-right: 42px;" type="text " name="hoten" value="{{$hoso->hoten}}"></td>
                    <td>
                        <td>Giới tính(Nữ ghi 1, Nam ghi 2)</td>
                        <td><input style="width: 15px;" type="text" name="gioitinh" value="{{$hoso->gioitinh}}"></td>
                    </td>
                </tr>


            </table>
            <table>
                <tr>
                    <td><b>2. Ngày sinh</b></td>

                    <td>


                            <input style="margin-left: 15px;" type="date" name="ngaysinh" value="{{$hoso->ngaysinh}}">

                    </td>


                </tr>

            </table>
            <table>
                <tr>
                    <td>
                        <td>
                            <p><b>3.a)Nơi sinh </b>(tỉnh hoặc thành phố):</p>
                        </td>
                        <td>
                            <input type="text" name="noisinh" value="{{$hoso->noisinh}}" style="width:450px;">
                        </td>
                    </td>


                </tr>

            </table>
            <table>

            <tr>
                <td>
                <td>
                        <td><b style="margin-left: 10px;">b) Dân tộc </b></td>
                        <td>
                            <input type="text" name="dantoc" value="{{$hoso->dantoc}}">
                        </td>

                    </td>

                </td>
                <td>
                <td><b style="margin-left:100px;">c) Quốc tịch</b></td>
                    <td><input  type="text" name="quoctich" value="{{$hoso->quoctich}}"></td>
                </td>

                </tr>
            </table>
            <table>
                <tr >
                    <td><p style="margin-top:px;"> <b >4. Số chứng minh nhân dân/ Thẻ căn cước công dân </b></p>  </td>
                    <td><input style="width:305px;float:right; margin-left:10px;" type="text"name="cmnd" value="{{$hoso->socmnd}}"></td>
                </tr>
                <tr>
                    <td><b>5. Hộ khẩu thường trú </b></td>
                    <td><input style="width : 305px; margin-left:10px;" type="text"name="hokhauthuongtru" value="{{$hoso->hokhauthuongtru}}"></td>
                </tr>


            </table>
            <p><b>6. Nơi học THPT hoặc tương đương </b></p>
            <table>
                <tr>
                    <td><b style="margin-left:13px;">Năm lớp 10</b></td>
                    <td><input style="width:730px; margin-left:10px;" type="text " name="lop10" value="{{$hoso->lop10}}"></td>
                </tr>

                <tr>
                    <td><b style="margin-left:13px;">Năm lớp 11</b></td>
                    <td><input style="width:730px; margin-left:10px;" type="text " name="lop11" value="{{$hoso->lop11}}"></td>
                </tr>

                <tr>
                    <td><b style="margin-left:13px;">Năm lớp 12</b></td>
                    <td><input style="width:730px; margin-left:10px;" type="text " name="lop12" value="{{$hoso->lop12}}"></td>
                </tr>

                <tr>
                    <td><b style="margin-left:13px;">Tên lớp 12</b></td>
                    <td><input style="width:730px; margin-left:10px;" type="text " name="tenlop12" value="{{$hoso->tenlop12}}"></td>
                </tr>



            </table>
            <table>
                <tr>
                    <td>
                        <th>7. Điện thoại</th>
                        <td>
                            <input style="width:300px; margin-left:14px;" type="text" name="dienthoai" value="{{$hoso->dienthoai}}">
                        </td>
                    </td>

                </tr>
                <tr>
                    <td>
                        <td><b style="margin-left: 20px;">Email</b></td>
                        <td>
                            <input style="width:300px; margin-left:4px; float:right;" type="text" name="email" value="{{$hoso->email}}">
                        </td>

                    </td>
                </tr>

            </table>
            <table>
                <tr>
                    <th>8. Họ và tên người liên hệ</th>
                    <td><input style="margin-left:10px; width:630px;" type="text"name="tennguoilienhe" value="{{$hoso->hotennguoilienhe}}"></td>
                </tr>

                <tr>
                    <th><p style="margin-left:20px;">Địa chỉ người liên hệ</p></th>
                    <td><input style="margin-left:10px; width:630px;" type="text"name="diachinguoilienhe" value="{{$hoso->diachinguoilienhe}}"></td>
                </tr>

                <tr>
                    <th><p style="margin-left:20px; ">Điện thoại người liên hệ</p></th>
                    <td><input style="margin-left:10px; width:630px;" type="text"name="dienthoainguoilienhe" value="{{$hoso->dienthoainguoilienhe}}"></td>
                </tr>
            </table>
            <b >B. THÔNG TIN ĐĂNG KÝ THI</b>
            <table>
                <tr>
                    <td>
                    <td><b>Mã hội đồng thi</b></td>
                        <td>
                            <input style="width:108px; margin-left:31px;" type="text" name="mahoidongthi" value="{{$hoso->mahoidongthi}}">
                        </td>
                    </td>
                    <td>
                    <td><b style="margin-left: 160px;">Mã đơn vị ĐKDT</b></td>
                        <td>
                            <input style="width:107px; margin-left:19px;" type="text" name="madonvidkxt" value="{{$hoso->madonvidkxt}}">
                        </td>

                    </td>


                </tr>


            </table>

            <table>
                <tr>
                    <td><p><b>14. Đối tượng ưu tiên tuyển sinh </b>(Ghi số đối tượng ưu tiên vào ô trống (01, 02, 03, 04, 05, 06, 07))</p></td>
                    <th><input style="width:50px; margin-left:10px;" type="text "name="doituong" value="{{$hoso->doituong}}"></th>
                </tr>
            </table>

            <table>
                <tr>
                    <td><p><b>15. Khu vực tuyển sinh </b>(Ghi mã khu vực vào ô trống (KV1, KV2-NT, KV2, KV3))</p></td>
                    <th><input style="width:50px; margin-left:10px;" type="text "name="makhuvuc" value="{{$hoso->makhuvuc}}"></th>
                </tr>
            </table>
            <table>
                <tr>
                    <td><p><b>16. Năm tốt nghiệp THPT hoặc tương đương </b>(Ghi đủ 4 số của năm tốt nghiệp vào ô trống)</p></td>
                    <th><input style="width:50px; margin-left:10px;" type="text "name="namtotnghiep" value="{{$hoso->namtotnghiep}}"></th>
                </tr>
            </table>

            <p style="color:red; font-size:13px;"><b>* Thí sinh đính kèm ảnh thẻ, ảnh CMND, CCCD</b></p>

            <div class="img" style="width:115px;height:140px;float:left;">
                <p>Hình thẻ</p>
                <img id="uploadPreview" style="width: 100px; height: 100px;" src="upload/hoso/{{$hoso->hinhanh}}"/>
                <input id="uploadImage" type="file"  name="hinh" onchange="PreviewImage();" value="{{$hoso->hinhanh}}" />
            </div>

            <div class="img" style="width:300px;height:140px;float:left; margin-left:200px;">
                <p>Hình CMND / CCCD (mặt trước)</p>
                <img id="uploadPreview0" style="width: 100px; height: 100px;" src="upload/hoso/{{$hoso->imgcmndtruoc}}"/>
                <input id="uploadImage0" type="file" name="imgcmndtruoc" onchange="PreviewImage0();" value="{{$hoso->imgcmndtruoc}}" />
            </div>

            <div class="img" style="width:300px;height:140px;float:left; margin-left:60px;">
                <p>Hình CMND / CCCD (mặt sau)</p>
                <img id="uploadPreview1" style="width: 100px; height: 100px;" src="upload/hoso/{{$hoso->imgcmndsau}}" />
                <input id="uploadImage1" type="file" name="imgcmndsau" onchange="PreviewImage1();" value="{{$hoso->imgcmndsau}}" />
            </div>

            </div>


            </div>


        </div>

        <input style="margin-top:200px; margin-left:-600px; color:white; width:200px;height:60px; font-size:18px; background-color:#609810;border-radius:10px;" type="submit" name="submit" value="Chỉnh sửa hồ sơ">

    </form>

</div>
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

<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

    function PreviewImage0() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage0").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview0").src = oFREvent.target.result;
        };
    };

    function PreviewImage1() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage1").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview1").src = oFREvent.target.result;
        };
    };

    function PreviewImage2() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage2").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview2").src = oFREvent.target.result;
        };
    };

    function PreviewImage3() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage3").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview3").src = oFREvent.target.result;
        };
    };

    function PreviewImage4() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage4").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview4").src = oFREvent.target.result;
        };
    };

</script>


