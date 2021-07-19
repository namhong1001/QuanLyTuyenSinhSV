@extends('qlts.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý hồ sơ
                        <small>Danh sách hồ sơ</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                    {{-- tim kiem --}}
                <form id="search-form" action="qlts/xulyhoso/timkiemhoso" method="GET">
                    <table style="margin:auto;">
                        <tr>

                            <td><p style="margin-left:0px;width:100px;">Mã hồ sơ:</p></td>
                            <td><input name="mahoso"></td>
                            <td><p style="margin-left:70px;width:100px;">Họ tên:</p></td>
                            <td><input name="hoten"></td>
                            <td><p style="margin-left:70px;width:100px;">Email:</p></td>
                            <td><input name="email"></td>


                        </tr>
                        <tr>
                            <td><p style="width:100px;">Điện thoại:</p></td>
                            <td><input name="dienthoai"></td>
                            <td><p style="margin-left:70px;width:120px;">Số CMND/CCCD:</p></td>
                            <td><input name="socmnd"></td>
                            <td><p style="margin-left:70px;width:100px;">Đợt xét tuyển:</p></td>
                            <td>
                                <select name="dotxettuyen">
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </td>
                        <tr>
                             <td><p  style="margin-left:0px;">Trạng thái:</p></td>

                            <td>
                                <select name="matrangthai" style="width:178px;">
                                    <option value=""></option>
                                    @foreach ($trangthai as $item)
                                        <option value="{{$item->matrangthai}}">{{$item->tentrangthai}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><button id="tim" type="submit"  style="margin-left:70px;border-color:white; background-color:#6699FF;  height:25px; border-radius:10px; color:white;">Tìm kiếm</button></td>
                        </tr>

                    </table>
                </form>



                <table class="table table-striped table-bordered table-hover" id="dataTable">
                    <thead>
                        <tr align="center">
                            <th>Mã hồ sơ</th>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Dân tộc</th>
                            <th>Quốc tịch</th>
                            <th>Hộ khẩu thường trú</th>
                            <th>Đối tượng</th>
                            <th>Khu vực</th>
                            <th>Số CMND/CCCD</th>
                            <th>Điện thoại</th>
                            <th>Email</th>
                            <th>Họ tên PH</th>
                            <th>Địa chỉ PH</th>
                            <th>Điện thoại PH</th>
                            {{-- <th>Hội đồng thi</th>
                            <th>Mã đvdkxt</th>
                            <th>Năm tốt nghiệp</th> --}}
                            <th>Đợt xét tuyển</th>
                            <th>Hình ảnh</th>
                            <th>Trạng thái</th>
                            <th>Duyệt</th>
                            <th>Nhập điểm</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hoso as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->mahoso}}</td>
                                <td>{{$item->hoten}}</td>
                                <td>
                                    @if($item->gioitinh == 1)
                                        {{'Nữ'}}
                                    @else
                                        {{'Nam'}}
                                    @endif
                                </td>
                                <td>{{$item->ngaysinh}}</td>
                                <td>{{$item->dantoc}}</td>
                                <td>{{$item->quoctich}}</td>
                                <td>{{$item->hokhauthuongtru}}</td>
                                <td>{{$item->doituong}}</td>
                                <td>{{$item->makhuvuc}}</td>
                                <td>{{$item->socmnd}}</td>
                                <td>{{$item->dienthoai}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->hotennguoilienhe}}</td>
                                <td>{{$item->diachinguoilienhe}}</td>
                                <td>{{$item->dienthoainguoilienhe}}</td>
                                {{-- <td>{{$item->mahoidongthi}}</td>
                                <td>{{$item->madonvidkxt}}</td>
                                <td>{{$item->namtotnghiep}}</td> --}}
                                <td>{{$item->dotxettuyen}}</td>
                                <td><img width="100px" src="upload/hoso/{{$item->hinhanh}}" /></td>
                                <td>{{$item->trangthai->tentrangthai}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="qlts/xulyhoso/duyet/{{$item->mahoso}}">Chi tiết</a></td>

                                <?php
                                    $phuongthuc = DB::table('hoso_phuongthuc')->where('mahoso',$item->mahoso)->get();
                                    foreach($phuongthuc as $pt){
                                        $p = $pt->maphuongthuc;
                                    if($p == 1){ ?>
                                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="qlts/quanlydiem/nhapdiem/{{$item->mahoso}}">Nhập điểm</a></td>
                                        <?php } else{
                                            ?>
                                                <td></td>
                                            <?php

                                        }

                                    }
                                ?>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
@section('script')
    {{-- <script>
        $('#hoten').on('keyup',function(){
            var hoten = $(this).val();
            $.ajax({
                url : 'qlts/xulyhoso/listhosos',

                type:'GET',
                data:{
                    'hoten':hoten
                },
                success:function(data){
                    $('tbody').html = data;
                }
            });
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        })
    </script> --}}
    <script>

        $(function() {
            $("#dataTable").DataTable({
                "responsive": true,
                "pageLength": 25,
                "lengthChange": false,
                "autoWidth": false,
                "language": {
                    "search": "Tìm kiếm:",
                    "info": "Hiển thị _START_ từ _END_ của _TOTAL_ bản ghi",
                    "infoEmpty": "Chưa có dữ liệu",
                    "loadingRecords": "Vui lòng đợi - loading...",
                    "processing": "Đang xử lý...",
                    "paginate": {

                        "next": "Tiếp",
                        "previous": "Lùi",
                        "first": "Đầu",
                        "last": "Cuối",


                    }
                },
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
</script>
@endsection
