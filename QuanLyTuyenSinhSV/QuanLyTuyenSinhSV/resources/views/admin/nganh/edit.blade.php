@extends('admin.layout.index')
@section('content')
     <!-- Page Content -->
     <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ngành
                        <small>{{$nganh->Ten}}</small>
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
                    <form action="admin/nganh/edit/{{$nganh->manganh}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Mã ngành</label>
                            <input class="form-control" name="Ma"  value="{{$nganh->manganh}}"/>
                        </div>
                        <div class="form-group">
                            <label>Tên ngành</label>
                            <input class="form-control" name="Ten"  value="{{$nganh->tennganh}}"/>
                        </div>

                        <div class="form-group">
                            <label>Hệ đào tạo</label>
                            <select class="form-control" name="HeDaoTao">
                                @foreach($hedaotao as $item)
                                <option
                                @if($nganh->mahedaotao == $item->mahedaotao)
                                    {{"selected"}}
                                @endif
                                value="{{$item->mahedaotao}}">{{$item->tenhedaotao}}</option>
                                @endforeach
                            </select>
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
