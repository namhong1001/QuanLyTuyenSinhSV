@extends('qlts.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">

                    <h1 class="page-header">Quản lý điểm
                        <small>Nhập điểm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <form action="qlts/quanlydiem/nhapdiem/{{$hoso->mahoso}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>{{$hoso->mahoso}} -</label>
                        <label>{{$hoso->hoten}} </label>
                    </div>
                    <table>
                        <tr>
                            <td>
                                @foreach ($mon as $value)
                                    <div class="form-group">
                                        <label>{{$value}} </label>
                                    </div>
                                @endforeach
                            </td>

                            <td>
                                {{-- @foreach ($diem as $key=>$value)
                                    <div class="form-group">
                                        <input type="text" name="diem[]" value="{{$value}}">
                                    </div>
                                @endforeach --}}
                                @foreach ($mamon as $value)
                                    <div class="form-group">
                                        <input type="text" name="diem[]">
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    </table>




                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>

                    <table style="width: 400px; margin-top:-380px; margin-left:500px;" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">

                                <th>Môn học</th>
                                <th>Điểm thi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diem as $item)
                                <tr class="odd gradeX" align="center">

                                    <td>{{$item->mon->tenmon}}</td>
                                    <td>{{$item->diem}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>






            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
