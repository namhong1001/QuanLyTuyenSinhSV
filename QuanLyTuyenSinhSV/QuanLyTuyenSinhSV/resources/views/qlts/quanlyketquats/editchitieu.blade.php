@extends('qlts.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý chỉ tiêu
                        <small>Edit</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $item)
                                {{$item}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>

                    @endif
                    <form action="qlts/quanlyketquats/editchitieu/{{$chitieu->machitieu}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group">
                            <label>Năm học</label>
                            <input class="form-control" name="namhoc" placeholder="Nhập năm học" value="{{$chitieu->namhoc}}" />
                        </div>


                        <div class="form-group">
                            <label>Ngành</label>
                            <select class="form-control" name="nganh">
                                <option
                                    @if($chitieu->nganh->manganh == $chitieu->manganh)
                                        {{"selected"}}
                                    @endif

                                value="{{$chitieu->manganh}}">{{$chitieu->nganh->tennganh}}</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <label>Chỉ tiêu</label>
                            <input type="text"  class="form-control ckeditor" name="chitieu" value={{$chitieu->soluong}}>
                        </div>
                        <div class="form-group">
                            <label>Điểm sàn</label>
                            <input type="text" class="form-control ckeditor" name="diemsan" value="{{$chitieu->diemsan}}">
                        </div>


                        <button type="submit" class="btn btn-default">Cập nhật</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>


@endsection

@section('script')

@endsection
