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
                            <th>Mã hội đồng thi</th>
                            <th>Tên hội đồng thi</th>

                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hdt as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->mahoidongthi}}</td>
                                <td>{{$item->tenhoidongthi}}</td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hoidongthi/delete/{{$item->mahoidongthi}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/hoidongthi/edit/{{$item->mahoidongthi}}">Edit</a></td>
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
