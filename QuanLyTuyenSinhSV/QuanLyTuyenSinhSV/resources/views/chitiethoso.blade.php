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
    <div class="thongtintrangthai" style="width:870px;height:320px;margin-top:-100px; border: 1px groove #cccccc;margin:0 auto; border-radius:10px;">
    <div class="thongtintrai" style="width:390px;height:270px; margin-left:10px;margin-top:20px;font-size:13px; ">
        <h3>Thông tin hồ sơ</h3>

            <table class="table table-bordered">

                <tbody>
                    <tr>
                        <td style="color: red">Mã hồ sơ</td>
                        <td>{{$hoso->mahoso}}</td>

                    </tr>


                    <tr>
                        <td style="color: red">Trúng tuyển</td>
                        <td>

                           Đang cập nhật
                        </td>
                    </tr>

                </tbody>
            </table>

            @if ($diem != [])
                @foreach($diem as $item)
                    <a style="color: green"><b>{{$item->mon->tenmon}}</b></a> - <a style="color: red"><b>{{$item->diem}}</b></a> &nbsp;&nbsp;&nbsp;&nbsp;
                @endforeach
            @endif
    </div>

        <div class="thongtinphai" style="width:440px;height:270px; float:right;margin-top:-270px; margin-left:250px;margin-right:10px;margin-buttom:-30px;">
            <tbody>
                <h3>Trạng thái hồ sơ</h3>
                <table class="table table-bordered" >
                    <div class="card card-default " style="background-color: #f9fafb; margin:auto;">
                        <div class="card-header">
                            <h6 class="m-0">Trạng thái</h6>
                        </div>
                        <div class="card-body" style="height:110px;margin-top:-30px;margin-buttom:10px;">
                            <div class="form-group">
                                <ul class="progressbar">

                                @if ($hoso->matrangthai==1)
                                <li class="active l1" style="width:120px;font-size:14px;">Chưa xử lý</li>
                                <li class=" l2" style="width:140px;font-size:14px;">Đang xử lý(chỉnh sửa)</li>
                                <li class=" l3"style="width:130px;font-size:14px;">Đã xử lý(Hợp lệ)</li>
                                @elseif($hoso->matrangthai==2)
                                <li class="complete l1" style="width:120px;font-size:14px;">Chưa xử lý</li>
                                <li class="active l2" style="width:140px;font-size:14px;">Đang xử lý(chỉnh sửa)</li>
                                <li class=" l3" style="width:130px;font-size:14px;">Đã xử lý(Hợp lệ)</li>
                                @else
                                <li class="complete l1" style="width:120px;font-size:14px;font-size:14px;">Chưa xử lý</li>
                                <li class="complete l2" style="width:140px;font-size:14px;">Đang xử lý(chỉnh sửa)</li>
                                <li class="complete l3" style="width:130px;font-size:14px;">Đã xử lý(Hợp lệ)</li>
                                @endif



                                </ul>
                            </div>
                        </div>

                        @if($hoso->matrangthai==2)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            Thông tin lỗi hồ sơ
                          </button>
                          @endif

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    @foreach($nhatky as $item)
                                    {{$item->thongtinloi}}
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    <tr>

                       <td><b> Ngày đăng ký: </b> {{$hoso->created_at}} </td>

                    </tr>

                </table>
            </tbody>
        </div>

        <div class="thongtinduoi" style="margin-left:10px;margin-right:10px; width:850px; height:40px; margin-button:20px;">
            <table class="table table-bordered">
                <tr>
                    <td style="background-color:blue;"></td>
                    <td  style="background-color:yellow;"></td>
                    <td  style="background-color:pink;"></td>
                </tr>
            </table>
        </div>
    </div>



<div style="margin-left:330px;" id="page-wrapper">
    <div class="col-lg-12">
        <h1 class="page-header">Chi tiết hồ sơ
            {{-- <small>Duyệt hồ sơ</small> --}}
        </h1>
    </div>

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
                    <td><input style="width: 450px; margin-right: 42px;" type="text " name="name" value="{{$hoso->hoten}}"></td>
                    <td>
                        <td>Giới tính(Nữ ghi 1, Nam ghi 2)</td>
                        <td><input style="width: 15px;" type="name" name="gt" value="{{$hoso->gioitinh}}"></td>
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
                            <input type="text" name="noisinh" value="{{$hoso->noisinh}}">
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
                    <td><input style="width : 305px; margin-left:10px;" type="text"name="hokhau" value="{{$hoso->hokhauthuongtru}}"></td>
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
                    <td><input style="margin-left:10px; width:630px;" type="text"name="tennguoilienhe" value="{{$hoso->tennguoilienhe}}"></td>
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
                            <input style="width:108px; margin-left:31px;" type="text" name="mahoidongthi" value="{{$hoso->hoidongthi->tenhoidongthi}}">
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
                    <th><input style="width:50px; margin-left:10px;" type="text "name="khuvuc" value="{{$hoso->makhuvuc}}"></th>
                </tr>
            </table>
            <table>
                <tr>
                    <td><p><b>16. Năm tốt nghiệp THPT hoặc tương đương </b>(Ghi đủ 4 số của năm tốt nghiệp vào ô trống)</p></td>
                    <th><input style="width:50px; margin-left:10px;" type="text "name="namtotnghiep" value="{{$hoso->namtotnghiep}}"></th>
                </tr>
            </table>

            <div class="img" style="width:350px;height:140px;float:left;">
                <img style="width:300px; height:150px" src="upload/hoso/{{$hoso->imgcmndtruoc}}">
            </div>

            <div class="img" style="width:350px;height:140px;float:left;">
                <img style="width:300px; height:150px" src="upload/hoso/{{$hoso->imgcmndsau}}">
            </div>


            <p style="font-style: italic; color: red; margin-top:200px;"><b>Phương thức xét tuyển:</b></p>
            <table style="margin-left:250px;margin-top:-30px;">
                @foreach ($phuongthuc as $item )
                <tr>

                        <td>

                                {{$item->phuongthuc->tenphuongthuc}}

                        </td>


                </tr>
                @endforeach


            </table>
            @if($kqts1!=[])
            <p style="margin-top:20px;margin-bottom:0px;"><b>* XÉT TUYỂN BẰNG ĐIỂM THI THPT</b></p>

            <p><b>- Đăng ký tổ hợp các môn thi: </b></p>
            <table style="margin-left:250px;margin-top:-30px;">
                <tr>
                    <td>
                        @if($tohop != [])
                            @foreach ($tohop as $item)
                                {{$item->tohop->tentohop}} <br>
                            @endforeach
                        @endif
                    </td>


                </tr>


            </table>

            <p><b>- Danh sách nguyện vọng đăng ký vào Đại học</b></p>


            <table class="order-list" style="border:1px; border-style:solid;margin-left:20px;">

                    <thead style="border:1px; border-style:solid;">
                        <tr>
                            <th style="width:100px;border:1px solid;text-align:center;">Thứ tự nguyện vọng</th>
                            <th><p style="width:100px;margin-left:60px; ">Mã ngành</p></th>
                            <th style=" margin-left:60px;width:400px;border:1px solid;text-align:center;">Tên ngành</th>
                            <th style=" margin-left:60px; width:100px;border:1px solid;text-align:center;">Khối</th>
                        </tr>

                    </thead>
                    <tbody style="border:1px; border-style:solid;">
                        @foreach ($kqts1 as $item )
                            <tr>
                                <td style="width:100px;border:1px solid;text-align:center;">{{$item->manguyenvong}}</td>
                                <td style="width:100px;margin-left:60px;text-align:center; ">{{$item->manganh}}</td>
                                <td style=" margin-left:60px;width:400px;border:1px solid;text-align:center;">{{$item->nganh->tennganh}}</td>
                                <td style=" margin-left:60px; width:100px;border:1px solid;text-align:center;">{{$item->khoi->tenkhoi}}</td>

                            </tr>
                        @endforeach
                    </tbody>

            </table>
            @endif

                {{-- <table style="margin-top:10px; margin-bottom:10px;">
                <tr>
                    <td><p style="margin-left:10px;">Tổng số nguyện vọng (Bắt buộc phải ghi)</p></td>
                    <td><input style="width:50px; margin-left:10px;" type="text" name="total"></td>
                </tr>
                </table> --}}

                @if($kqts2!=[])
                <p style="margin-top:20px;margin-bottom:0px;"><b>* XÉT TUYỂN BẰNG HỌC BẠ</b></p>

            <p style=""><b>- Các môn trong tổ hợp cần để xét tuyển học bạ</b></p>

            <div class="img" style="width:350px;height:140px;float:left;">
                <img style="width:300px; height:150px" src="upload/hoso/{{$hoso->imghocba}}">
            </div>

            <div class="Xethb">

            <table class="order-list-diem" style="border:1px; border-style:solid;text-align:center;margin-left:20px;">

                    <thead>
                        <th style="width:100px;border:1px; border-style:solid;text-align:center;">Môn học</th></th>
                        <th style="width:100px; border:1px; border-style:solid;text-align:center;">Điểm</th>
                    </thead>
                    <tbody>
                        @foreach ($diem2 as $item)
                            <tr>
                                <td style="width:100px; border:1px; border-style:solid;">{{$item->mon->tenmon}}</td>
                                <td style="width:100px; border:1px; border-style:solid;">{{$item->diem}}</td>
                            </tr>
                        @endforeach
                    </tbody>



            </table>


            </table>



            <p style="margin-top:80px;"><b>- Danh sách nguyện vọng đăng ký vào Đại học </b></p>
            <table class="order-list-hb" style="margin-left:20px;">

                <thead style="border:1px; border-style:solid;">
                        <tr>
                            <th style="width:100px;border:1px solid;text-align:center;">Thứ tự nguyện vọng</th>
                            <th><p style="width:100px;margin-left:60px; ">Mã ngành</p></th>
                            <th style=" margin-left:60px;width:400px;border:1px solid;text-align:center;">Tên ngành</th>
                            <th style=" margin-left:60px; width:100px;border:1px solid;text-align:center;">Khối</th>
                        </tr>
                </thead>
                    <tbody>
                        @foreach ($kqts2 as $item )
                            <tr>
                                <td style="width:100px;border:1px solid;text-align:center;">{{$item->manguyenvong}}</td>
                                <td style="width:100px;margin-left:60px;border:1px solid;text-align:center; ">{{$item->manganh}}</td>
                                <td style=" margin-left:60px;width:400px;border:1px solid;text-align:center;" >{{$item->nganh->tennganh}}</td>
                                <td style=" margin-left:60px; width:100px;border:1px solid;text-align:center;" >{{$item->khoi->tenkhoi}}</td>

                            </tr>
                        @endforeach
                    </tbody>

            </table>
            @endif
                {{-- <table style="margin-top:10px; margin-bottom:10px;">
                <tr>
                    <td><p style="margin-left:10px;">Tổng số nguyện vọng (Bắt buộc phải ghi)</p></td>
                    <td><input style="width:50px; margin-left:10px;" type="text" name="total"></td>
                </tr>
                </table> --}}




            @if($kqts3!=[])
               <p style="margin-top:20px;margin-bottom:0px;"><b>* XÉT TUYỂN THẲNG VÀO ĐẠI HỌC</b></p>


                <table>
                    <tr>
                        <th>- Năm đoạt giải:</th>
                        <td>{{$hoso->namdoatgiai}}</td>
                    </tr>
                </table>

                <p><b>- Môn đoạt giải, loại giải, loại huy chương:</b></p>
                <table style="margin-top:5px;margin-left:20px;margin-bottom:20px;">
                    <thead style="border:1px; border-style:solid;">
                        <tr>
                            <td style="width:100px;border:1px solid;text-align:center;" ><p style="margin-left:0px;" >Môn đoạt giải</p></td>
                            <td style="width:200px;border:1px solid;text-align:center;">Loại giải, loại huy chương</td>
                        </tr>
                    </thead>

                        <tbody style="border:1px; border-style:solid;">
                            <tr >
                                <td style="width:100px;border:1px solid;text-align:center;">{{$hoso->mondoatgiai}}</td>
                                <td style="width:200px;border:1px solid;text-align:center;">{{$hoso->loaigiaihuychuong}}</td>
                            </tr>
                        </tbody>


                </table>
                <table>
                    <tr>
                        <th>- Trong đội tuyển Olympic khu vực và quốc tế môn:</th>
                        <th>{{$hoso->olympicmon}}</th>
                    </tr>
                </table>


            <p style="margin-top:10px;"><b>- Danh sách nguyện vọng đăng ký vào </b></p>


            <table class="order-list-tt" style="margin-left:20px;">

                    <thead>
                        <th style="width:100px;border:1px solid;text-align:center;">Thứ tự nguyện vọng</th>
                        <th style="width:100px;margin-left:60px;border:1px solid;text-align:center; ">Mã ngành</th>
                        <th style=" margin-left:60px;width:400px;border:1px solid;text-align:center;">Tên ngành</th>
                        <th style=" margin-left:60px;width:100px;border:1px solid;text-align:center;">Khối</th>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="qlts/xulyhoso/deletenv/{{$item->mahspt}}">Xóa</a></td>
                    </thead>
                    <tbody>
                        @foreach ($kqts3 as $item )
                            <tr>
                                <td style="width:100px;border:1px solid;text-align:center;" >{{$item->manguyenvong}}</td>
                                <td style="width:100px;margin-left:60px;border:1px solid;text-align:center; ">{{$item->manganh}}</td>
                                <td style=" margin-left:60px;width:400px;border:1px solid;text-align:center;">{{$item->nganh->tennganh}}</td>
                                <td style=" margin-left:60px;width:100px;border:1px solid;text-align:center;">{{$item->khoi->tenkhoi}}</td>
                            </tr>
                        @endforeach
                    </tbody>

            </table>
            @endif
                {{-- <table style="margin-top:10px; margin-bottom:10px;">
                <tr>
                    <td><p style="margin-left:10px;">Tổng số nguyện vọng (Bắt buộc phải ghi)</p></td>
                    <td><input style="width:50px; margin-left:10px;" type="text" name="total"></td>
                </tr>
                </table> --}}

                @if($kqts4!=[])
                <p style="margin-top:20px;margin-bottom:0px;"><b>* XÉT TUYỂN BẰNG ĐIỂM THI NĂNG LỰC QUỐC GIA </b></p>

                <table>
                <tr>
                <th>- Điểm thi năng lực quốc gia:</th>
                @foreach ($diem4 as $item)
                    <td>{{$item->diem}}</td>
                @endforeach
                </tr>
                </table>

        <p><b>- Danh sách nguyện vọng đăng ký vào Đại học</b></p>


        <table class="order-list-nlqg" style="margin-left:20px;">

            <thead>
                <th style="width:100px;border:1px solid;text-align:center;">Thứ tự nguyện vọng</th>
                <th style="width:100px;margin-left:60px;border:1px solid;text-align:center; ">Mã ngành</th>
                <th style=" margin-left:60px;width:400px;border:1px solid;text-align:center;">Tên ngành</th>
                <th style=" margin-left:60px;width:100px;border:1px solid;text-align:center;">Khối</th>
            </thead>
            <tbody>
                @foreach ($kqts4 as $item )
                    <tr>
                        <td style="width:100px;border:1px solid;text-align:center;">{{$item->manguyenvong}}</td>
                        <td style="width:100px;margin-left:60px;border:1px solid;text-align:center; ">{{$item->manganh}}</td>
                        <td style=" margin-left:60px;width:400px;border:1px solid;text-align:center;">{{$item->nganh->tennganh}}</td>
                        <td style=" margin-left:60px;width:100px;border:1px solid;text-align:center;" >{{$item->khoi->tenkhoi}}</td>

                    </tr>
                @endforeach
            </tbody>

        </table>
        @endif
                {{-- <table style="margin-top:10px; margin-bottom:10px;">
                <tr>
                    <td><p style="margin-left:10px;">Tổng số nguyện vọng (Bắt buộc phải ghi)</p></td>
                    <td><input style="width:50px; margin-left:10px;" type="text" name="total"></td>
                </tr>
                </table> --}}







                {{-- <input style="margin-left:400px; color:white; width:100px;height:30px; font-size:18px; background-color:#609810;" type="submit" name="submit" value="submit"> --}}





            </div>


            </div>


        </div>

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


