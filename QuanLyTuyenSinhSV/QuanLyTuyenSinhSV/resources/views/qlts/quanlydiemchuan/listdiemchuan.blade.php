@extends('qlts.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý điểm chuẩn
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

                 {{-- tìm kiếm
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

                        <td><button id="tim" type="submit"  style="margin-left:70px;border-color:white; background-color:#6699FF;  height:25px; border-radius:10px; color:white;">Tìm kiếm</button></td>
                    </tr>
                </table>
                    </form> --}}

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>Năm học</th>
                            <th>Ngành</th>
                            <th>Phương thức xét tuyển</th>
                            <th>Điểm chuẩn</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diemchuan as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->namhoc}}</td>
                                <td>{{$item->nganh->tennganh}}</td>
                                <td>{{$item->phuongthuc->tenphuongthuc}}</td>
                                <td>{{$item->diemchuan}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <form action="{{route('exportdiemchuan')}}" method="POST">
                    @csrf
                    <input type="submit" value="Export"  class="btn btn-success">
                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>


@endsection
