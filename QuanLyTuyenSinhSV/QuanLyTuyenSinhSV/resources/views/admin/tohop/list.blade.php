@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tổ hợp xét tuyển
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
                            <th>Mã tổ hợp</th>
                            <th>Tên tổ hợp</th>

                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tohop as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->matohop}}</td>
                                <td>{{$item->tentohop}}</td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tohop/delete/{{$item->matohop}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tohop/edit/{{$item->matohop}}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <form action="{{url('import-csv')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" accept=".xlsx"><br>
                    <input type="submit" value="Import" name="import_csv" class="btn btn-warning">
                </form>

                <form action="{{url('export-csv')}}" method="POST">
                    @csrf
                    <input type="submit" value="Export" name="export_csv" class="btn btn-success">
                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>


@endsection
