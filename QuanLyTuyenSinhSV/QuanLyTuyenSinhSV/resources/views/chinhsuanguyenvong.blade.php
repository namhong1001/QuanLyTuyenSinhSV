<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hệ thống tuyển sinh trực tuyến</title>
    <base href="{{asset('')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap Core CSS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="/sinhvien_asset/css/shop-homepage.css" rel="stylesheet">
    <link href="/sinhvien_asset/css/my.css" rel="stylesheet">

</head>

<body>
    <form action="chinhsuanguyenvong/{{$hoso->mahoso}}" method="POST" name="dangkynguyenvong" enctype="multipart/form-data" style="width:auto;height:2000px; margin:10px auto;">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <h3 style="margin-top:-50px;text-align:center;margin-bottom:20px;">Chỉnh sửa nguyện vọng</h3>

        <div class="thongtintrangthai" style="width:850px;height:auto;margin-top:70px; margin:0 auto; background-color:#EEEEEE;border:3px dashed #888888;border-radius:5px;">

            <div>
                <b style="font-style: italic; color: red; margin-top:20px;margin-left:30px;">Phương thức xét tuyển:</b>
                <table style="margin-left:210px;margin-top:-25px;">
                    @foreach ($phuongthuc as $item )
                    <tr>
                        <td>
                                {{$item->phuongthuc->tenphuongthuc}}
                        </td>
                    </tr>
                    @endforeach


                </table>
            </div>


            @if($kqts1!=[])
            <p style="margin-top:20px;margin-bottom:0px;margin-left:30px;"><b>* XÉT TUYỂN BẰNG ĐIỂM THI THPT</b></p>

            <p><b style="margin-left:30px;">- Đăng ký tổ hợp các môn thi: </b></p>
            <table style="margin-left:260px;margin-top:-40px;">
                <tr>
                    <td>
                        @if($tohop != [])
                            @foreach ($tohop as $item)
                                {{$item->tohop->tentohop}} <br>
                            @endforeach
                        @endif
                    </td>


                </tr>


            </table>

            <p><b style="margin-left:30px;">- Danh sách nguyện vọng đã đăng ký vào Đại học</b></p>


            <table style="border:1px; border-style:solid;margin-left:40px;">

                    <thead style="border:1px; border-style:solid;">
                        <tr>
                            <th style="width:100px;border:1px solid;text-align:center;">Thứ tự nguyện vọng</th>
                            <th><p style="width:100px;margin-left:60px; ">Mã ngành</p></th>
                            <th style=" margin-left:60px;width:400px;border:1px solid;text-align:center;">Tên ngành</th>
                            <th style=" margin-left:60px; width:100px;border:1px solid;text-align:center;">Khối</th>
                        </tr>

                    </thead>
                    <tbody style="border:1px; border-style:solid;">
                        @foreach ($kqts1 as $item )
                            <tr>
                                <td style="width:100px;border:1px solid;text-align:center;">{{$item->manguyenvong}}</td>
                                <td style="width:100px;margin-left:60px;text-align:center; ">{{$item->manganh}}</td>
                                <td style=" margin-left:60px;width:400px;border:1px solid;text-align:center;">{{$item->nganh->tennganh}}</td>
                                <td style=" margin-left:60px; width:100px;border:1px solid;text-align:center;">{{$item->khoi->tenkhoi}}</td>

                            </tr>
                        @endforeach
                    </tbody>

            </table>

            <div style="margin-top:50px;">
                <p style="text-align:center;">Thay đổi nguyện vọng (lưu ý khi thay đổi nguyện vọng, tất cả các nguyện vọng cũ sẽ bị xóa tất cả)</p>
                <table id="nv" class="order-list" style="margin-left:100px;">
                    <thead>
                        <th>Thứ tự nguyện vọng</th>
                        <th>Mã ngành</th>
                        <th style="width:100px;">Khối</th>
                        <td> <input  style="width:100px;" type="button" value="addrow" id="btnadd"></td>
                    </thead>
                    <tbody>
                    <tr>
                    <td><input type="text" name="manguyenvong1[]"></td>
                    <td ><select style="width:250px;" name="manganh1[]" id="Nganh">
                            @foreach ($nganh as $item)
                                <option value="{{$item->manganh}}">{{$item->tennganh}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td >
                        <select style="width:100px;" name="makhoi1[]" id="Khoi">
                            @foreach ($khoi as $item)
                                <option value="{{$item->makhoi}}">{{$item->tenkhoi}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input  style="width:100px;" id="delete" class="danger" value="delete" type="button"></td>
                    </tr>

                    </tbody>
                    <tfoot>

            </tfoot>
                </table>

                </tr>
                </table>
            </div>

            @endif

                {{-- <table style="margin-top:10px; margin-bottom:10px;">
                <tr>
                    <td><p style="margin-left:10px;">Tổng số nguyện vọng (Bắt buộc phải ghi)</p></td>
                    <td><input style="width:50px; margin-left:10px;" type="text" name="total"></td>
                </tr>
                </table> --}}

                @if($kqts2!=[])
                <p style="margin-top:20px;margin-bottom:0px;"><b>* XÉT TUYỂN BẰNG HỌC BẠ</b></p>

            <p style=""><b>- Các môn trong tổ hợp cần để xét tuyển học bạ</b></p>

            <div class="img" style="width:350px;height:140px;float:left;">
                <img style="width:300px; height:150px" src="upload/hoso/{{$hoso->imghocba}}">
            </div>

            <div class="Xethb">

            <table  style="border:1px; border-style:solid;text-align:center;margin-left:20px;">

                    <thead>
                        <th style="width:100px;border:1px; border-style:solid;text-align:center;">Môn học</th></th>
                        <th style="width:100px; border:1px; border-style:solid;text-align:center;">Điểm</th>
                    </thead>
                    <tbody>
                        @foreach ($diem2 as $item)
                            <tr>
                                <td style="width:100px; border:1px; border-style:solid;">{{$item->mon->tenmon}}</td>
                                <td style="width:100px; border:1px; border-style:solid;">{{$item->diem}}</td>
                            </tr>
                        @endforeach
                    </tbody>



            </table>


            </table>



            <p style="margin-top:80px;"><b>- Danh sách nguyện vọng đăng ký vào Đại học </b></p>
            <table  style="margin-left:20px;">

                <thead style="border:1px; border-style:solid;">
                        <tr>
                            <th style="width:100px;border:1px solid;text-align:center;">Thứ tự nguyện vọng</th>
                            <th><p style="width:100px;margin-left:60px; ">Mã ngành</p></th>
                            <th style=" margin-left:60px;width:400px;border:1px solid;text-align:center;">Tên ngành</th>
                            <th style=" margin-left:60px; width:100px;border:1px solid;text-align:center;">Khối</th>
                        </tr>
                </thead>
                    <tbody>
                        @foreach ($kqts2 as $item )
                            <tr>
                                <td style="width:100px;border:1px solid;text-align:center;">{{$item->manguyenvong}}</td>
                                <td style="width:100px;margin-left:60px;border:1px solid;text-align:center; ">{{$item->manganh}}</td>
                                <td style=" margin-left:60px;width:400px;border:1px solid;text-align:center;" >{{$item->nganh->tennganh}}</td>
                                <td style=" margin-left:60px; width:100px;border:1px solid;text-align:center;" >{{$item->khoi->tenkhoi}}</td>

                            </tr>
                        @endforeach
                    </tbody>

            </table>

            <div style="margin-top:50px; margin-left:20px;">
                <p>Thay đổi nguyện vọng (lưu ý khi thay đổi nguyện vọng, tất cả các nguyện vọng cũ sẽ bị xóa tất cả)</p>
                <table id="nv" class="order-list-hb">
                    <thead>
                        <th>Thứ tự nguyện vọng</th>
                        <th>Mã ngành</th>
                        <th style="width:100px;">Khối</th>
                        <td> <input  type="button" value="addrow" id="btnadd-hb"></td>
                    </thead>
                    <tbody>
                    <tr>
                    <td><input type="text" name="manguyenvong2[]"></td>
                    <td ><select style="width:250px;" name="manganh2[]" id="Nganh">
                            @foreach ($nganh as $item)
                                <option value="{{$item->manganh}}">{{$item->tennganh}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td >
                        <select style="width:100px;" name="makhoi2[]" id="Khoi">
                            @foreach ($khoi as $item)
                                <option value="{{$item->makhoi}}">{{$item->tenkhoi}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input  style="width:48px;" id="delete-hb" class="danger-hb" value="delete" type="button"></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            @endif
                {{-- <table style="margin-top:10px; margin-bottom:10px;">
                <tr>
                    <td><p style="margin-left:10px;">Tổng số nguyện vọng (Bắt buộc phải ghi)</p></td>
                    <td><input style="width:50px; margin-left:10px;" type="text" name="total"></td>
                </tr>
                </table> --}}




            @if($kqts3!=[])
               <p style="margin-top:20px;margin-bottom:0px;"><b>* XÉT TUYỂN THẲNG VÀO ĐẠI HỌC</b></p>


                <table>
                    <tr>
                        <th>- Năm đoạt giải:</th>
                        <td>{{$hoso->namdoatgiai}}</td>
                    </tr>
                </table>

                <p><b>- Môn đoạt giải, loại giải, loại huy chương:</b></p>
                <table style="margin-top:5px;margin-left:20px;margin-bottom:20px;">
                    <thead style="border:1px; border-style:solid;">
                        <tr>
                            <td style="width:100px;border:1px solid;text-align:center;" ><p style="margin-left:0px;" >Môn đoạt giải</p></td>
                            <td style="width:200px;border:1px solid;text-align:center;">Loại giải, loại huy chương</td>
                        </tr>
                    </thead>

                        <tbody style="border:1px; border-style:solid;">
                            <tr >
                                <td style="width:100px;border:1px solid;text-align:center;">{{$hoso->mondoatgiai}}</td>
                                <td style="width:200px;border:1px solid;text-align:center;">{{$hoso->loaigiaihuychuong}}</td>
                            </tr>
                        </tbody>


                </table>
                <table>
                    <tr>
                        <th>- Trong đội tuyển Olympic khu vực và quốc tế môn:</th>
                        <th>{{$hoso->olympicmon}}</th>
                    </tr>
                </table>


            <p style="margin-top:10px;"><b>- Danh sách nguyện vọng đăng ký vào </b></p>


            <table  style="margin-left:20px;">

                    <thead>
                        <th style="width:100px;border:1px solid;text-align:center;">Thứ tự nguyện vọng</th>
                        <th style="width:100px;margin-left:60px;border:1px solid;text-align:center; ">Mã ngành</th>
                        <th style=" margin-left:60px;width:400px;border:1px solid;text-align:center;">Tên ngành</th>
                        <th style=" margin-left:60px;width:100px;border:1px solid;text-align:center;">Khối</th>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="qlts/xulyhoso/deletenv/{{$item->mahspt}}">Xóa</a></td>
                    </thead>
                    <tbody>
                        @foreach ($kqts3 as $item )
                            <tr>
                                <td style="width:100px;border:1px solid;text-align:center;" >{{$item->manguyenvong}}</td>
                                <td style="width:100px;margin-left:60px;border:1px solid;text-align:center; ">{{$item->manganh}}</td>
                                <td style=" margin-left:60px;width:400px;border:1px solid;text-align:center;">{{$item->nganh->tennganh}}</td>
                                <td style=" margin-left:60px;width:100px;border:1px solid;text-align:center;">{{$item->khoi->tenkhoi}}</td>
                            </tr>
                        @endforeach
                    </tbody>

            </table>

            <div style="margin-top:50px; margin-left:20px;">
                <p>Thay đổi nguyện vọng (lưu ý khi thay đổi nguyện vọng, tất cả các nguyện vọng cũ sẽ bị xóa tất cả)</p>
                <table id="nv" class="order-list-tt">
                    <thead>
                        <th>Thứ tự nguyện vọng</th>
                        <th>Mã ngành</th>
                        <th style="width:100px;">Khối</th>
                        <td> <input  type="button" value="addrow" id="btnadd-tt"></td>
                    </thead>
                    <tbody>
                    <tr>
                    <td><input type="text" name="manguyenvong3[]"></td>
                    <td ><select style="width:250px;" name="manganh3[]" id="Nganh">
                            @foreach ($nganh as $item)
                                <option value="{{$item->manganh}}">{{$item->tennganh}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td >
                        <select style="width:100px;" name="makhoi3[]" id="Khoi">
                            @foreach ($khoi as $item)
                                <option value="{{$item->makhoi}}">{{$item->tenkhoi}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input  style="width:48px;" id="delete-tt" class="danger-tt" value="delete" type="button"></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            @endif
                {{-- <table style="margin-top:10px; margin-bottom:10px;">
                <tr>
                    <td><p style="margin-left:10px;">Tổng số nguyện vọng (Bắt buộc phải ghi)</p></td>
                    <td><input style="width:50px; margin-left:10px;" type="text" name="total"></td>
                </tr>
                </table> --}}

                @if($kqts4!=[])
                <p style="margin-top:20px;margin-bottom:0px;"><b>* XÉT TUYỂN BẰNG ĐIỂM THI NĂNG LỰC QUỐC GIA </b></p>

                <table>
                <tr>
                <th>- Điểm thi năng lực quốc gia:</th>
                @foreach ($diem4 as $item)
                    <td>{{$item->diem}}</td>
                @endforeach
                </tr>
                </table>

        <p><b>- Danh sách nguyện vọng đăng ký vào Đại học</b></p>


        <table  style="margin-left:20px;">

            <thead>
                <th style="width:100px;border:1px solid;text-align:center;">Thứ tự nguyện vọng</th>
                <th style="width:100px;margin-left:60px;border:1px solid;text-align:center; ">Mã ngành</th>
                <th style=" margin-left:60px;width:400px;border:1px solid;text-align:center;">Tên ngành</th>
                <th style=" margin-left:60px;width:100px;border:1px solid;text-align:center;">Khối</th>
            </thead>
            <tbody>
                @foreach ($kqts4 as $item )
                    <tr>
                        <td style="width:100px;border:1px solid;text-align:center;">{{$item->manguyenvong}}</td>
                        <td style="width:100px;margin-left:60px;border:1px solid;text-align:center; ">{{$item->manganh}}</td>
                        <td style=" margin-left:60px;width:400px;border:1px solid;text-align:center;">{{$item->nganh->tennganh}}</td>
                        <td style=" margin-left:60px;width:100px;border:1px solid;text-align:center;" >{{$item->khoi->tenkhoi}}</td>

                    </tr>
                @endforeach
            </tbody>

        </table>

        <div style="margin-top:50px; margin-left:20px;">
            <p>Thay đổi nguyện vọng (lưu ý khi thay đổi nguyện vọng, tất cả các nguyện vọng cũ sẽ bị xóa tất cả)</p>
            <table id="nv" class="order-list-nlqg">
                <thead>
                    <th>Thứ tự nguyện vọng</th>
                    <th>Mã ngành</th>
                    <th style="width:100px;">Khối</th>
                    <td> <input  type="button" value="addrow" id="btnadd-nlqg"></td>
                </thead>
                <tbody>
                <tr>
                <td><input type="text" name="manguyenvong4[]"></td>
                <td ><select style="width:250px;" name="manganh4[]" id="Nganh">
                        @foreach ($nganh as $item)
                            <option value="{{$item->manganh}}">{{$item->tennganh}}</option>
                        @endforeach
                    </select>
                </td>
                <td >
                    <select style="width:100px;" name="makhoi4[]" id="Khoi">
                        @foreach ($khoi as $item)
                            <option value="{{$item->makhoi}}">{{$item->tenkhoi}}</option>
                        @endforeach
                    </select>
                </td>
                <td><input  style="width:48px;" id="delete-nlqg" class="danger-nlqg" value="delete" type="button"></td>
                </tr>

                </tbody>
            </table>
        </div>
        @endif
                {{-- <table style="margin-top:10px; margin-bottom:10px;">
                <tr>
                    <td><p style="margin-left:10px;">Tổng số nguyện vọng (Bắt buộc phải ghi)</p></td>
                    <td><input style="width:50px; margin-left:10px;" type="text" name="total"></td>
                </tr>
                </table> --}}







                <input style="margin-left:400px;margin-top:10px; color:white; width:100px;height:30px; font-size:18px; background-color:#609810;" type="submit" name="submit" value="Chỉnh sửa">
            </div>
            </div>
        </div>
        </div>
    </form>



    <!-- jQuery -->
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

</body>

</html>

<script>
    $(document).ready(function(){

        $("#btnadd").click(function(){

            var row=$('<tr>');
            var col='';
            col += '<td><input type="text" name="manguyenvong1[]"></td>';
            col += '<td ><select style="width:250px;" name="manganh1[]" id="Nganh"> @foreach ($nganh as $item)<option value="{{$item->manganh}}">{{$item->tennganh}}</option>@endforeach</select></td>'
            col += '<td><select style="width:100px;" name="makhoi1[]" id="Khoi">@foreach ($khoi as $item)<option value="{{$item->makhoi}}">{{$item->tenkhoi}}</option>@endforeach</select></td>';
            col += '<td><input style="width:48px;" id="delete" class="danger" value="delete" type="button"></td>';
            row.append(col);

            $('table.order-list').append(row);

        });
        $('table.order-list').on('click','#delete',function(event){
            $(this).closest('tr').remove();
        })
    });
    </script>

    <script>
    $(document).ready(function(){
        $("#btnadd-hb").click(function(){
            var row=$('<tr>');
            var col='';
            col += '<td><input type="text" name="manguyenvong2[]"></td>';
            col += '<td ><select style="width:250px;" name="manganh2[]" id="Nganh"> @foreach ($nganh as $item)<option value="{{$item->manganh}}">{{$item->tennganh}}</option>@endforeach</select></td>'
            col += '<td><select style="width:100px;" name="makhoi2[]" value="khoi" id="Khoi">@foreach ($khoi as $item)<option value="{{$item->makhoi}}">{{$item->tenkhoi}}</option>@endforeach</select></td>';
            col += '<td><input style="width:48px;" id="delete-hb" class="danger-hb" value="delete" type="button"></td>';
            row.append(col);
            $('table.order-list-hb').append(row);
        });
        $('table.order-list-hb').on('click','#delete-hb',function(event){
            $(this).closest('tr').remove();
        })
    });
    </script>

    <script>
    $(document).ready(function(){
        $("#btnadd-tt").click(function(){
            var row=$('<tr>');
            var col='';
            col += '<td><input type="text" name="manguyenvong3[]"></td>';
            col += '<td ><select style="width:250px;" name="manganh3[]" id="Nganh"> @foreach ($nganh as $item)<option value="{{$item->manganh}}">{{$item->tennganh}}</option>@endforeach</select></td>'
            col += '<td><select style="width:100px;" name="makhoi3[]" value="khoi" id="Khoi">@foreach ($khoi as $item)<option value="{{$item->makhoi}}">{{$item->tenkhoi}}</option>@endforeach</select></td>';
            col += '<td><input style="width:48px;" id="delete-tt" class="danger-tt" value="delete" type="button"></td>';
            row.append(col);
            $('table.order-list-tt').append(row);
        });
        $('table.order-list-tt').on('click','#delete-tt',function(event){
            $(this).closest('tr').remove();
        })
    });
    </script>

    <script>
    $(document).ready(function(){
        $("#btnadd-nlqg").click(function(){

            var row=$('<tr>');
            var col='';
            col += '<td><input type="text" name="manguyenvong4[]"></td>';
            col += '<td ><select style="width:250px;" name="manganh4[]" id="Nganh"> @foreach ($nganh as $item)<option value="{{$item->manganh}}">{{$item->tennganh}}</option>@endforeach</select></td>'
            col += '<td><select style="width:100px;" name="makhoi4[]" value="khoi" id="Khoi">@foreach ($khoi as $item)<option value="{{$item->makhoi}}">{{$item->tenkhoi}}</option>@endforeach</select></td>';
            col += '<td><input style="width:48px;" id="delete-nlqg" class="danger-nlqg" value="delete" type="button"></td>';
            row.append(col);
            $('table.order-list-nlqg').append(row);
        });
        $('table.order-list-nlqg').on('click','#delete-nlqg',function(event){
            $(this).closest('tr').remove();
        })
    });
    </script>


