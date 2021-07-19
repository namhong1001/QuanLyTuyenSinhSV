@extends('admin.layout.index')
@section('content')
     <!-- Page Content -->
     <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin tức
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $er)
                                {{$er}}
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/tintuc/edit/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group">
                            <label>LoaiTin</label>
                            <select id="LoaiTin" class="form-control" name="LoaiTin">
                                @foreach ($loaitin as $item)
                                <option
                                    @if($tintuc->loaitin->id == $item->id)
                                        {{"selected"}}
                                    @endif

                                value="{{$item->id}}">{{$item->Ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="TieuDe" value="{{$tintuc->TieuDe}}" />
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea id="demo" class="form-control ckeditor" name="TomTat">{{$tintuc->TomTat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="demo" class="form-control ckeditor" name="NoiDung">{{$tintuc->NoiDung}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh tin tức</label>
                            <input type="file" class="form-control" name="Hinh" />{{$tintuc->Hinh}}
                        </div>
                        <div class="form-group">
                            <label>Nổi bật</label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="0"
                                @if($tintuc->NoiBat == 0)
                                    {{"checked"}}
                                @endif
                                type="radio">Không
                            </label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="1"
                                @if($tintuc->NoiBat == 0)
                                    {{"checked"}}
                                @endif
                                type="radio">Có
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Edit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>



    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Bình luận
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>User</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach($tintuc->comment as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{$item->id}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->NoiDung}}</td>
                        <td>{{$item->created_at}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/delete/{{$item->id}}/{{$tintuc->id}}"> Delete</a></td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>

        // $(document).ready(function(){
        //     $("#TheLoai").change(function(){
        //         var idTheLoai = $(this).val();
        //         $.get("admin/ajax/loaitin/"+idTheLoai, function(data){
        //             $("#LoaiTin").html(data);
        //         })
        //     })
        // })

    </script>
@endsection
