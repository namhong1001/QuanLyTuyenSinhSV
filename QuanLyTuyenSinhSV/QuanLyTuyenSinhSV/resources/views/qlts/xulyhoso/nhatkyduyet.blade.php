@extends('qlts.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý hồ sơ
                        <small>Nhật ký duyệt hồ sơ</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif


                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>Mã người duyệt</th>
                            <th>Tên người duyệt</th>
                            <th>Mã hồ sơ</th>
                            <th>Tên thí sinh</th>
                            <th>Trạng thái</th>
                            <th>Thông tin lỗi</th>
                            <th>Thời gian duyệt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nhatky as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->manguoiduyet}}</td>
                                <td>{{$item->nguoiduyet->tennguoiduyet}}</td>
                                <td>{{$item->mahoso}}</td>
                                <td>{{$item->hoso->hoten}}</td>
                                <td>{{$item->trangthai->tentrangthai}}</td>
                                <td>{{$item->thongtinloi}}</td>
                                <td>{{$item->created_at}}</td>
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
