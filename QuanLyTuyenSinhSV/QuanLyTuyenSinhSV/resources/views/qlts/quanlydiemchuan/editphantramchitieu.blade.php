@extends('qlts.layout.index')
@section('content')
     <!-- Page Content -->
     <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Phần trăm chỉ tiêu
                        <small>{{$phantramct->id}}</small>
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
                    <form action="qlts/quanlydiemchuan/editphantramchitieu/{{$phantramct->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Phương thức xét tuyển</label>
                            <select class="form-control" name="maphuongthuc">
                                <option
                                    @if($phantramct->phuongthuc->maphuongthuc == $phantramct->maphuongthuc)
                                        {{"selected"}}
                                    @endif

                                value="{{$phantramct->maphuongthuc}}">{{$phantramct->phuongthuc->tenphuongthuc}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Phần trăm chỉ tiêu</label>
                            <input class="form-control" name="phantramchitieu"  value="{{$phantramct->phantramchitieu}}"/>
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
