@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin tức
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Tiêu đề không dấu</th>
                            <th>Tóm tắt</th>
                            <th>Nội dung</th>
                            {{-- <th>Hình ảnh</th> --}}
                            <th>Nổi bật</th>
                            <th>Số lượt xem</th>

                            <th>Loại tin</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tintuc as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->id}}</td>
                                <td><p>{{$item->TieuDe}}</p>
                                    <img width="100px" src="upload/tintuc/{{$item->Hinh}}" />
                                </td>
                                <td>{{$item->TieuDeKhongDau}}</td>
                                <td>{{$item->TomTat}}</td>
                                <td>{{$item->NoiDung}}</td>
                                {{-- <td>{{$item->Hinh}}</td> --}}
                                <td>
                                    @if($item->NoiBat == 0)
                                        {{'Không'}}
                                    @else
                                        {{'Có'}}
                                    @endif
                                </td>
                                <td>{{$item->SoLuotXem}}</td>

                                <td>{{$item->loaitin->Ten}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/delete/{{$item->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/edit/{{$item->id}}">Edit</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
