@extends('qlts.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý điểm chuẩn
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
                    <form action="qlts/quanlydiemchuan/adddiemchuan" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group">
                            <label>Năm học</label>
                            <input class="form-control" name="namhoc" placeholder="Nhập năm học" />
                        </div>


                        <div class="form-group">
                            <label>Ngành</label>
                            <select class="form-control" name="manganh" >
                                @foreach($nganh as $item)
                                <option value="{{$item->manganh}}">{{$item->tennganh}}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <label>Phương thức</label>
                            <select class="form-control" name="maphuongthuc" >
                                @foreach($phuongthuc as $item)
                                <option value="{{$item->maphuongthuc}}">{{$item->tenphuongthuc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Điểm chuẩn</label>
                            <input type="text" class="form-control ckeditor" name="diemchuan">
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
