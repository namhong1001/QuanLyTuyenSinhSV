@extends('qlts.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý hồ sơ
            <small>Duyệt hồ sơ</small>
        </h1>
    </div>
    <form action="qlts/xulyhoso/duyet/{{$hoso->mahoso}}" method="POST" name="dangkyhoso" enctype="multipart/form-data">
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
                    <td>
                        <td><b style="margin-left: 80px;">Email</b></td>
                        <td>
                            <input style="width:285px; margin-left:14px; float:right;" type="text" name="email" value="{{$hoso->email}}">
                        </td>

                    </td>


                </tr>

            </table>
            <table>
                <tr>
                    <th>8. Họ và tên người liên hệ</th>
                    <td><input style="margin-left:10px; width:643px;" type="text"name="tennguoilienhe" value="{{$hoso->tennguoilienhe}}"></td>
                </tr>

                <tr>
                    <th>Địa chỉ người liên hệ</th>
                    <td><input style="margin-left:10px; width:643px;" type="text"name="diachinguoilienhe" value="{{$hoso->diachinguoilienhe}}"></td>
                </tr>

                <tr>
                    <th><b style="margin-left:15px; ">Điện thoại người liên hệ</b></th>
                    <td><input style="margin-left:10px; width:643px;" type="text"name="dienthoainguoilienhe" value="{{$hoso->dienthoainguoilienhe}}"></td>
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
            <table style="margin-left:165px;margin-top:-30px;">
                <tr>
                    @foreach ($phuongthuc as $item )
                        <td>
                            <td>
                                {{$item->phuongthuc->tenphuongthuc}}
                            </td>
                        </td>
                    @endforeach

                </tr>


            </table>
            @if($kqts1!=[])
            <p style="margin-top:20px;margin-bottom:0px;"><b>* XÉT TUYỂN BẰNG ĐIỂM THI THPT</b></p>

            <p><b>- Đăng ký tổ hợp các môn thi: </b></p>
            <table style="margin-left:200px;margin-top:-30px;">
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

            <div style="height:200px;margin:0 auto;">
                <p style="text-align:center; font-size:16px; color:red;margin-top:20px;"><b>Chọn và ghi lỗi nếu hồ sơ bị lỗi</b></p>
            <div class="chonloi" style=" width:60%; float:left;">
                <div class="scroll-table" style="height: 200px;overflow: auto;display: block;width: 520px;tr {display: table;width: 100%;table-layout: fixed;}">
                    <table style="width:500px;">
                        <tr>
                            <td>Họ tên</td>
                            <td><input type="checkbox" name="sai[]" value="Họ tên"></td>
                        </tr>
                        <tr>
                            <td>Ngày sinh</td>
                            <td><input type="checkbox" name="sai[]" value="Ngày sinh"></td>
                        </tr>
                        <tr>
                            <td>Giới tính</td>
                            <td><input type="checkbox" name="sai[]" value="Giới tính"></td>
                        </tr>
                        <tr>
                            <td>Nơi sinh</td>
                            <td><input type="checkbox" name="sai[]" value="Nơi sinh"></td>
                        </tr>
                        <tr>
                            <td>Dân tộc</td>
                            <td><input type="checkbox" name="sai[]" value="Họ tên"></td>
                        </tr>
                        <tr>
                            <td>Quốc tịch</td>
                            <td><input type="checkbox" name="sai[]" value="Quốc tịch"></td>
                        </tr>
                        <tr>
                            <td>Số CMND / CCCD</td>
                            <td><input type="checkbox" name="sai[]" value="Số CMND / CCCD"></td>
                        </tr>
                        <tr>
                            <td>Hộ khẩu</td>
                            <td><input type="checkbox" name="sai[]" value="Hộ khẩu"></td>
                        </tr>
                        <tr>
                            <td>Nơi học THPT</td>
                            <td><input type="checkbox" name="sai[]" value="Nơi học THPT"></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><input type="checkbox" name="sai[]" value="Điện thoại"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="checkbox" name="sai[]" value="Email"></td>
                        </tr>
                        <tr>
                            <td>Họ tên PH</td>
                            <td><input type="checkbox" name="sai[]" value="Họ tên PH"></td>
                        </tr>
                        <tr>
                            <td>Điện thoại PH</td>
                            <td><input type="checkbox" name="sai[]" value="Điện thoại PH"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ PH</td>
                            <td><input type="checkbox" name="sai[]" value="Địa chỉ PH"></td>
                        </tr>
                        <tr>
                            <td>Mã hội đồng thi</td>
                            <td><input type="checkbox" name="sai[]" value="Mã hội đồng thi"></td>
                        </tr>
                        <tr>
                            <td>Mã đơn vị đăng ký dự thi</td>
                            <td><input type="checkbox" name="sai[]" value="Mã đơn vị DKDT"></td>
                        </tr>
                        <tr>
                            <td>Đối tượng ưu tiên</td>
                            <td><input type="checkbox" name="sai[]" value="Đối tượng ưu tiên"></td>
                        </tr>
                        <tr>
                            <td>Khu vực</td>
                            <td><input type="checkbox" name="sai[]" value="Khu vực"></td>
                        </tr>
                        <tr>
                            <td>Năm tốt nghiệp</td>
                            <td><input type="checkbox" name="sai[]" value="Năm tốt nghiệp"></td>
                        </tr>
                        <tr>
                            <td>Điền nguyện vọng phương thức không đúng phần của phương thức đã chọn</td>
                            <td><input type="checkbox" name="sai[]" value="Điền nguyện vọng phương thức không đúng phần của phương thức đã chọn"></td>
                        </tr>
                        <tr>
                            <td>Đăng ký tổ hợp thi không hợp lệ</td>
                            <td><input type="checkbox" name="sai[]" value="Đăng ký tổ hợp thi không hợp lệ"></td>
                        </tr>
                        <tr>
                            <td>Nguyện vọng không đúng với quy định của trường</td>
                            <td><input type="checkbox" name="sai[]" value="Nguyện vọng không đúng với quy định của trường"></td>
                        </tr>
                        <tr>
                            <td>Điểm học bạ không chính xác</td>
                            <td><input type="checkbox" name="sai[]" value="Điểm học bạ không chính xác"></td>
                        </tr>
                        <tr>
                            <td>Năm đoạt giải không đúng</td>
                            <td><input type="checkbox" name="sai[]" value="Năm đoạt giải không đúng"></td>
                        </tr>
                        <tr>
                            <td>Môn loại giải huy chương không đúng</td>
                            <td><input type="checkbox" name="sai[]" value="Môn loại giải huy chương không đúng"></td>
                        </tr>
                        <tr>
                            <td>Giải olympic không đúng</td>
                            <td><input type="checkbox" name="sai[]" value="Giải olympic không đúng"></td>
                        </tr>
                        <tr>
                            <td>Điểm thi năng lực quốc gia không chính xác</td>
                            <td><input type="checkbox" name="sai[]" value="Điểm thi năng lực quốc gia không chính xác"></td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="ghiloi" style="width:40%; float:left; margin-left:-100px;">


                    <textarea cols="50" rows="10" name="loi" placeholder="Hãy điền thông tin lỗi cụ thể vào đây nếu hồ sơ bị sai sót thông tin nào" style="margin-left:20px;"></textarea>


            </div>
        </div>
        <table style="margin:0 auto; " class="checkhoso">
            <tr>
                @if($hoso->matrangthai != 3)
                <button style="height:30px; font-size:18px; margin-left:300px; background-color:blue; color:white;border-radius:5px;border-color:blue;" type="submit" name="hople">Hồ sơ hợp lệ</button>
                @endif

                <button id="demo" style="height:30px; font-size:18px;margin-left:20px; background-color:blue; color:white;border-radius:5px;border-color:blue;" type="submit" name="khonghople" onclick="test">Hồ sơ không hợp lệ</button>
                </tr>

        </table>
            </div>


        </div>










    </form>
</div>


@endsection
