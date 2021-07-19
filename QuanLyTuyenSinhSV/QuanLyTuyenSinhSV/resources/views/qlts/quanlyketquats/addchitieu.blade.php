@extends('qlts.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý chỉ tiêu
                        <small>Thêm</small>
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
                    <form action="qlts/quanlyketquats/addchitieu" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group">
                            <label>Năm học</label>
                            <input class="form-control" name="namhoc" placeholder="Nhập năm học" />
                        </div>


                        <div class="form-group">
                            <label>Ngành</label>
                            <select class="form-control" name="nganh" >
                                @foreach($nganh as $item)
                                <option value="{{$item->manganh}}">{{$item->tennganh}}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <label>Chỉ tiêu</label>
                            <input type="text"  class="form-control ckeditor" name="chitieu" >
                        </div>
                        <div class="form-group">
                            <label>Điểm sàn</label>
                            <input type="text" class="form-control ckeditor" name="diemsan">
                        </div>


                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Reset</button>
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
