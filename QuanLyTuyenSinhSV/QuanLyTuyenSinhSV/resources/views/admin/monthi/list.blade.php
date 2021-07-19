@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Môn thi
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
                            <th>Mã môn thi</th>
                            <th>Tên môn thi</th>
                            <th>Tổ hợp xét tuyển</th>

                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($monthi as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->mamon}}</td>
                                <td>{{$item->tenmon}}</td>
                                <td>{{$item->tohop->tentohop}}</td>

                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/monthi/delete/{{$item->mamon}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/monthi/edit/{{$item->mamon}}">Edit</a></td>
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
