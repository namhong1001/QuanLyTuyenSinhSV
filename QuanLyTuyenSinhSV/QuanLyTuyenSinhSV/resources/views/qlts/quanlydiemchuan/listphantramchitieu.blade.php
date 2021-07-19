@extends('qlts.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Phần trăm chỉ tiêu
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
                            <th>ID</th>
                            <th>Phương thức xét tuyển</th>
                            <th>Phần trăm chỉ tiêu</th>

                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phantramct as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->phuongthuc->tenphuongthuc}}</td>
                                <td>{{$item->phantramchitieu}}</td>

                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="qlts/quanlydiemchuan/editphantramchitieu/{{$item->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <form action="{{route('exporthdt')}}" method="POST">
                    @csrf
                    <input type="submit" value="Export"  class="btn btn-success">
                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>


@endsection
