@extends('qlts.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý trúng tuyển
                        <small>Danh sách</small>
                        {{-- {{Auth::user()->email}} --}}
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('thongbao'))
                    <div class="alert alert-danger">
                        {{session('thongbao')}}
                    </div>
                @endif

                {{-- tìm kiếm --}}
                <form id="search-form" action="qlts/quanlyketquats/timkiemcttt" method="GET">
                <table>
                <tr>
                    <td><p  style="margin-left:70px;">Phương thức xét tuyển:</p></td>
                    <td>
                        <select name="maphuongthuc" style="width:150px;">
                            <option value=""></option>
                            @foreach ($phuongthuc as $item)
                                <option value="{{$item->maphuongthuc}}">{{$item->tenphuongthuc}}</option>
                            @endforeach
                        </select>
                    </td>

                    <td><p  style="margin-left:70px;">Ngành:</p></td>
                    <td>
                        <select name="manganh" style="width:150px;">
                            <option value=""></option>
                            @foreach ($nganh as $item)
                                <option value="{{$item->manganh}}">{{$item->tennganh}}</option>
                            @endforeach
                        </select>
                    </td>

                    <td><p style="margin-left:70px;">Nguyện vọng</p></td>
                            <td><input name="manguyenvong"></td>

                    <td><button id="tim" type="submit"  style="margin-left:70px;border-color:white; background-color:#6699FF;  height:25px; border-radius:10px; color:white;">Tìm kiếm</button></td>
                </tr>
            </table>
                </form>

                <table class="table table-striped table-bordered table-hover" id="dataTable">
                    <thead>
                        <tr align="center">
                            <th>Mã hồ sơ</th>
                            <th>Họ tên thí sinh</th>
                            <th>Phương thức xét tuyển</th>
                            <th>Nguyện vọng</th>
                            <th>Ngành</th>
                            <th>Khối</th>
                            <th>Tổng điểm</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tuyenthang as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->mahoso}}</td>
                                <td>{{$item->hoten}}</td>
                                <td>{{$item->tenphuongthuc}}</td>
                                <td>{{$item->manguyenvong}}</td>
                                <td>{{$item->tennganh}}</td>
                                <td>{{$item->tenkhoi}}</td>
                                <td>{{$item->tongdiem}}</td>
                            </tr>
                        @endforeach
                        @foreach ($kq as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->mahoso}}</td>
                                <td>{{$item->hoten}}</td>
                                <td>{{$item->tenphuongthuc}}</td>
                                <td>{{$item->manguyenvong}}</td>
                                <td>{{$item->tennganh}}</td>
                                <td>{{$item->tenkhoi}}</td>
                                <td>{{$item->tongdiem}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <form action="{{route('exporttttheopt')}}" method="POST">
                    @csrf
                    <table>
                        <tr>
                            <td><p  style="margin-left:70px;">Phương thức xét tuyển:</p></td>
                            <td>
                                <select name="phuongthuc" style="width:150px;">
                                    <option value=""></option>
                                    @foreach ($phuongthuc as $item)
                                        <option value="{{$item->maphuongthuc}}">{{$item->tenphuongthuc}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input name="ept" style="margin-left:100px; margin-top:25px;" type="submit" value="Export theo phương thức"  class="btn btn-success"></td>
                        </tr>
                    </table>

                </form>

                <form action="{{route('exporttttheonganh')}}" method="POST">
                    @csrf
                    <table>
                        <tr>

                            <td><p  style="margin-left:70px;">Ngành:</p></td>
                            <td>
                                <select name="nganh" style="width:150px;">
                                    <option value=""></option>
                                    @foreach ($nganh as $item)
                                        <option value="{{$item->manganh}}">{{$item->tennganh}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input name="en" style="margin-left:200px; margin-top:25px;" type="submit" value="Export theo ngành"  class="btn btn-success"></td>
                        </tr>
                    </table>

                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>


@endsection

@section('script')
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
