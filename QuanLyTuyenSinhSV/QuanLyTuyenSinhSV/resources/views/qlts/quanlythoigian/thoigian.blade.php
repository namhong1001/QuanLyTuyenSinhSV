@extends('qlts.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý attribute
                        {{-- <small>Danh sách</small> --}}
                        {{-- {{Auth::user()->email}} --}}
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('thongbao'))
                    <div class="alert alert-danger">
                        {{session('thongbao')}}
                    </div>
                @endif
               <form action="qlts/quanlythoigian/thoigian" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <table>


                        <tr>
                            <td><strong>Đăng ký hồ sơ</strong></td>

                            <td style="padding-left: 20px"><input
                                                            @if($dk == "on")
                                                            {{"checked"}}
                                                            @endif
                                                            type="radio" name="dangkyhoso" value="on"> Bật</td>
                            <td style="padding-left: 20px"><input
                                                            @if($dk == "off")
                                                            {{"checked"}}
                                                            @endif
                                                            type="radio" name="dangkyhoso" value="off"> Tắt</td>
                        </tr>
                        <tr>
                            <td><strong>Chỉnh sửa hồ sơ</strong></td>
                            <td style="padding-left: 20px"><input
                                                            @if($cs == "on")
                                                            {{"checked"}}
                                                            @endif
                                                            type="radio" name="chinhsuahoso" value="on"> Bật</td>
                            <td style="padding-left: 20px"><input
                                                            @if($cs == "off")
                                                            {{"checked"}}
                                                            @endif
                                                            type="radio" name="chinhsuahoso" value="off"> Tắt</td>
                        </tr>
                        <tr>
                            <td><strong>Chỉnh sửa nguyện vọng</strong></td>
                            <td style="padding-left: 20px"><input
                                                            @if($nv == "on")
                                                            {{"checked"}}
                                                            @endif
                                                            type="radio" name="chinhsuanguyenvong" value="on"> Bật</td>
                            <td style="padding-left: 20px"><input
                                                            @if($nv == "off")
                                                            {{"checked"}}
                                                            @endif
                                                            type="radio" name="chinhsuanguyenvong" value="off"> Tắt</td>
                        </tr>
                        <tr>
                            <td><strong>Đợt xét tuyển</strong></td>
                            <td style="padding-left: 20px"><input
                                                            @if($xt == 1)
                                                            {{"checked"}}
                                                            @endif
                                                            type="radio" name="dotxettuyen" value="1"> Đợt 1</td>
                            <td style="padding-left: 20px"><input
                                                            @if($xt == 2)
                                                            {{"checked"}}
                                                            @endif
                                                            type="radio" name="dotxettuyen" value="2"> Đợt 2</td>
                            <td style="padding-left: 20px"><input
                                                            @if($xt == 3)
                                                            {{"checked"}}
                                                            @endif
                                                            type="radio" name="dotxettuyen" value="3"> Đợt 3</td>
                        </tr>


                    </table>
                    <input type="submit">
               </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>


@endsection
