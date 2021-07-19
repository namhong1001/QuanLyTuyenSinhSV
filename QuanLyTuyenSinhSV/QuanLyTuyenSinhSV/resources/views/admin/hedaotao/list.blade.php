@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hệ đào tạo
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
                            <th>Mã hệ đào tạo</th>
                            <th>Tên hệ đào tạo</th>

                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hdt as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->mahedaotao}}</td>
                                <td>{{$item->tenhedaotao}}</td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hedaotao/delete/{{$item->mahedaotao}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/hedaotao/edit/{{$item->mahedaotao}}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <form action="{{route('importhdt')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" accept=".xlsx"><br>
                    <input type="submit" value="Import"  class="btn btn-warning">
                </form>

                <object data="file/hedaotao.xlsx"></object>

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
