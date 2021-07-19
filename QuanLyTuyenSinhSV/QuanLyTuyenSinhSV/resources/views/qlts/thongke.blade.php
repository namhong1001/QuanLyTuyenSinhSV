@extends('qlts.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống kê
                        <small>List</small>
                        {{-- {{Auth::user()->email}} --}}
                    </h1>
                </div>
                <div><a id="idd"></a></div>
                <div class="container-fluid col-md-12">
                    <div id="myfirstchart"></div>

                </div>

                <div class="container-fluid col-md-12" style="margin-top: 55px;">
                    <div id="myfirstchart1"></div>

                </div>
                <!-- /.col-lg-12 -->
                @if(session('thongbao'))
                    <div class="alert alert-danger">
                        {{session('thongbao')}}
                    </div>
                @endif

                <table class="table table-striped table-bordered table-hover" id="dataTable">
                    <thead>
                        <tr align="center">
                            <th>Năm học</th>
                            <th>Phương thức xét tuyển</th>
                            <th>Ngành</th>
                            <th>Số lượng đăng ký</th>
                            <th>Số lượng trúng tuyển</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($thongke as $item)
                            <tr class="odd gradeX" align="center">
                                <td>2021</td>
                                <td>{{$item->phuongthuc->tenphuongthuc}}</td>
                                <td>{{$item->nganh->tennganh}}</td>
                                <td>{{$item->soluongdangky}}</td>
                                <td>{{$item->soluongtrungtuyen}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h5 style="color: red;">Tổng số nguyện vọng đăng ký vào trường: {{$totaldangky}} </h5>
                <h5 style="color: red;">Tổng số nguyện vọng trúng tuyển vào trường: {{$totaltrungtuyen}} </h5>

                <form action="{{route('exporthdt')}}" method="POST">
                    @csrf
                    <input type="submit" value="Export"  class="btn btn-success">
                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    {{-- vẽ biểu đồ thống kê --}}



@endsection

@section('script')
    <script>
         $(document).ready(function() {

            let token = document.head.querySelector('[name=csrf-token]').content;
            loaddata();
            var char = new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'myfirstchart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.

                xkey: 'nam',
                ykeys: ['soluongdangky', 'soluongtrungtuyen'],
                label: ['số lượng đăng ký', 'số lượng trúng tuyển'],
                labels: ['số lượng đăng ký', 'số lượng trúng tuyển'],
                hideHover: 'auto',
                behaveLikeLine: true,
                resize: true,

            });
            function loaddata () {

                $.ajax({
                    url: '/ajax/thongketheonam',
                    type: 'get',
                    data: {
                        _token: token
                    },
                    success: function(data) {

                        char.setData(data);
                    }
                })
            };

    })




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
