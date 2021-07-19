@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ngành
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

                @if(session()->has('success'))
                    <div class="alert alert-success">
                    {{ session()->get('success') }}
                    </div>
                @endif

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>Mã ngành</th>
                            <th>Tên ngành</th>
                            <th>Hệ đào tạo</th>

                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nganh as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->manganh}}</td>
                                <td>{{$item->tennganh}}</td>
                                <td>{{$item->hedaotao->tenhedaotao}}</td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nganh/delete/{{$item->manganh}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nganh/edit/{{$item->manganh}}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <form action="{{route('importnganh')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" accept=".xlsx"><br>
                    <input type="submit" value="Import"  class="btn btn-warning">
                </form>

                <object data="file/nganh.xlsx"></object>

                <form action="{{route('exportnganh')}}" method="POST">
                    @csrf
                    <input type="submit" value="Export"  class="btn btn-success">
                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>


@endsection
