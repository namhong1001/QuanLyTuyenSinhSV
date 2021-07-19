@extends('qlts.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý chỉ tiêu
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

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>Năm học</th>
                            <th>Ngành</th>
                            <th>Chỉ tiêu</th>
                            <th>Điểm sàn</th>

                            <th>Delete</th>
                            <th>Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ct as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->namhoc}}</td>
                                <td>{{$item->nganh->tennganh}}</td>
                                <td>{{$item->soluong}}</td>
                                <td>{{$item->diemsan}}</td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="qlts/quanlyketquats/deletechitieu/{{$item->machitieu}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="qlts/quanlyketquats/editchitieu/{{$item->machitieu}}">Edit</a></td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <form action="{{route('exportchitieu')}}" method="POST">
                    @csrf
                    <input type="submit" value="Export"  class="btn btn-success">
                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>


@endsection
