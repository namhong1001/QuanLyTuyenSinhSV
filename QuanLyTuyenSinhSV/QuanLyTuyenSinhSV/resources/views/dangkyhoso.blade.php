<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Phiếu đăng ký xét tuyển Đại học Đà Lạt</title>
	<link rel="stylesheet" type="text/css" href="style122.css">
	<!-- jQuery -->
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>


	<style>
	.dataTables_info{display: none;}
	.paginate_button {
		display:none;
	}
	</style>

</head>
<body>






    <form action="dangkyhoso" method="POST" name="dangkyhoso" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
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

        @if(session('loi'))
        <div class="alert alert-success">
            {{session('loi')}}
        </div>

        @endif
        <div id="container">
            <div class="head">

			<div class="left">
				<table class="header_left">
					<tr>
						<th style="text-decoration: underline;">SỞ GDDT:</th>
						<th>Tỉnh Lâm Đồng</th>
					</tr>


		</table>
			</div>
			<div class="right">
				<b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></br>
				<b style="text-decoration: underline;">Độc lập - Tự do - Hạnh phúc</b></br>
			</div>


			<div class="title1">
						<p style="text-align:center; margin-top:20px;"><b>PHIẾU ĐĂNG KÝ DỰ THI TỐT NGHIỆP THPT</b></p></br>
						<p style="text-align:center; margin-top:-20px;"> <b>VÀ XÉT TUYỂN VÀO ĐẠI HỌC </b>
                        <p style="text-align: center; font-size: 12px; font-style: italic;">(Trước khi kê khai Phiếu đăng ký dự thi(ĐKDT), thí sinh phải đọc kỹ các mục và HƯỚNG DẪN GHI PHIẾU,</p></p></tr>
						<p style="text-align: center;font-size: 12px; font-style: italic;">những điểm chưa rõ thí sinh có thể hỏi cán bộ tiếp nhận ĐKDT để được hướng dẫn)</p>
			</div>

            <div id="content">
			<div>

		</div>
        <p style="margin-top:20px;"><b>A. THÔNG TIN CÁ NHÂN</b></p>
				<p style="width:450px;"><b>1. Họ, chữ đệm và tên của thí sinh</b></p>
				<p> (Viết đúng như giấy khai sinh bằng chữ in hoa có dấu)</p>
			</div>
            <table class="infomation">
				<tr>
					<td><input style="width: 450px;
					margin-right: 42px;" type="text " name="name"></td>
					<td>
						<td>Giới tính(Nữ ghi 1, Nam ghi 2)</td>
						<td><input style="width: 15px;" type="name" name="gt"></td>
					</td>
				</tr>


			</table>
            <table>
				<tr>
					<td><b>2. Ngày sinh</b></td>

					<td>


 							 <input style="margin-left: 15px;" type="date" name="ngaysinh">

					</td>


				</tr>

			</table>
            <table>
				<tr>
					<td>
						<td>
							<p><b>3.a)Nơi sinh </b>(tỉnh hoặc thành phố):</p>
						</td>
						<td>
							<input type="text" name="noisinh">
						</td>
					</td>


				</tr>

			</table>
            <table>

			<tr>
				<td>
				<td>
						<td><b style="margin-left: 10px;">b) Dân tộc </b>(ghi bằng chữ):</td>
						<td>
							<input type="text" name="dantoc">
						</td>

					</td>

				</td>
				<td>
				<td><b style="margin-left:100px;">c) Quốc tịch</b></td>
					<td><input  type="text" name="quoctich"></td>
				</td>

				</tr>
			</table>
            <table>
				<tr >
					<td><p style="margin-top:px;"> <b >4. Số chứng minh nhân dân/ Thẻ căn cước công dân </b></p>  </td>
					<td><input style="width:305px;float:right; margin-left:10px;" type="text"name="cmnd"></td>
				</tr>
				<tr>
					<td><b>5. Hộ khẩu thường trú </b>(Ghi rõ tên xã (phường), quận (huyện), tỉnh(thành phố))</td>
					<td><input style="width : 305px; margin-left:10px;" type="text"name="hokhau"></td>
				</tr>


			</table>
            <p><b>6. Nơi học THPT hoặc tương đương </b>(Ghi tên trường và địa chỉ trường: huyện (quận), tỉnh (thành phố)) </p>
			<table>
				<tr>
					<td><b style="margin-left:13px;">Năm lớp 10</b></td>
					<td><input style="width:730px; margin-left:10px;" type="text " name="lop10"></td>
				</tr>

				<tr>
					<td><b style="margin-left:13px;">Năm lớp 11</b></td>
					<td><input style="width:730px; margin-left:10px;" type="text " name="lop11"></td>
				</tr>

				<tr>
					<td><b style="margin-left:13px;">Năm lớp 12</b></td>
					<td><input style="width:730px; margin-left:10px;" type="text " name="lop12"></td>
				</tr>

				<tr>
					<td><b style="margin-left:13px;">Tên lớp 12</b></td>
					<td><input style="width:730px; margin-left:10px;" type="text " name="tenlop12"></td>
				</tr>



			</table>
            <table>
				<tr>
					<td>
						<th>7. Điện thoại</th>
						<td>
							<input style="width:300px; margin-left:14px;" type="text" name="dienthoai">
						</td>
					</td>
					<td>
						<td><b style="margin-left: 80px;">Email</b></td>
						<td>
							<input style="width:285px; margin-left:14px;" type="text" name="email">
						</td>

					</td>


				</tr>

			</table>
            <table>
				<tr>
					<th>8. Họ và tên người liên hệ</th>
					<td><input style="margin-left:10px; width:643px;" type="text"name="tennguoilienhe"></td>
				</tr>

				<tr>
					<th>Địa chỉ người liên hệ</th>
					<td><input style="margin-left:10px; width:643px;" type="text"name="diachinguoilienhe"></td>
				</tr>

				<tr>
					<th><b style="margin-left:15px;">Điện thoại người liên hệ</b></th>
					<td><input style="margin-left:10px; width:643px;" type="text"name="dienthoainguoilienhe"></td>
				</tr>
			</table>
            <b >B. THÔNG TIN ĐĂNG KÝ THI</b>
			<table>
				<tr>
					<td>
					<td><b>Mã hội đồng thi</b></td>
						<td>
							<input style="width:108px; margin-left:31px;" type="text" name="mahoidongthi">
						</td>
					</td>
					<td>
					<td><b style="margin-left: 160px;">Mã đơn vị ĐKDT</b></td>
						<td>
							<input style="width:107px; margin-left:19px;" type="text" name="madonvidkxt">
						</td>

					</td>


				</tr>


			</table>

            <table>
				<tr>
					<td><p><b>14. Đối tượng ưu tiên tuyển sinh </b>(Ghi số đối tượng ưu tiên vào ô trống (01, 02, 03, 04, 05, 06, 07))</p></td>
					<th><input style="width:50px; margin-left:10px;" type="text "name="doituong"></th>
				</tr>
			</table>

			<table>
				<tr>
					<td><p><b>15. Khu vực tuyển sinh </b>(Ghi mã khu vực vào ô trống (KV1, KV2-NT, KV2, KV3))</p></td>
					<th><input style="width:50px; margin-left:10px;" type="text "name="khuvuc"></th>
				</tr>
			</table>
            <table>
				<tr>
					<td><p><b>16. Năm tốt nghiệp THPT hoặc tương đương </b>(Ghi đủ 4 số của năm tốt nghiệp vào ô trống)</p></td>
					<th><input style="width:50px; margin-left:10px;" type="text "name="namtotnghiep"></th>
				</tr>
			</table>
			<p style="margin-left:20px; margin-top:5px;margin-bottom:5px; font-style: italic;font-size:15px; "><b>Tôi xin cam đoan những lời khai trong phiếu ĐKDT này là đúng sự thật. Nếu sai tôi xin chịu sự xử lý theo các quy chế hiện hành của Bộ Giáo dụ vào Đào tạo.</b></p>
			<p style="color:red; font-size:13px;"><b>* Thí sinh đính kèm ảnh thẻ, ảnh CMND, CCCD</b></p>

            <div class="img" style="width:115px;height:140px;float:left;">
                <p>Hình thẻ</p>
                <img id="uploadPreview" style="width: 100px; height: 100px;" />
                <input id="uploadImage" type="file" class="form-control" name="hinh" onchange="PreviewImage();" />
            </div>

            <div class="img" style="width:220px;height:140px;float:left; margin-left:150px;">
                <p>Hình CMND / CCCD (mặt trước)</p>
                <img id="uploadPreview0" style="width: 100px; height: 100px;" />
                <input id="uploadImage0" type="file" class="form-control" name="imgcmndtruoc" onchange="PreviewImage0();" />
            </div>

            <div class="img" style="width:220px;height:140px;float:left; margin-left:60px;">
                <p>Hình CMND / CCCD (mặt sau)</p>
                <img id="uploadPreview1" style="width: 100px; height: 100px;" />
                <input id="uploadImage1" type="file" class="form-control" name="imgcmndsau" onchange="PreviewImage1();" />
            </div>


			<p style="font-style: italic; color: red; margin-top:160px;font-size:17px;"><b>*Chọn phương thức xét tuyển</b></p>
            <table>
				<tr>
					<td>
						<td><p style="margin-left:60px;">Bằng điểm thi THPT</p></td>
						<td>
							<input style=" margin-left:5px;" type="checkbox" name="phuongthuc[]" value="1">
						</td>
					</td>
					<td>
						<td><p style="margin-left: 30px;">Bằng học bạ</p></td>
						<td>
							<input style=" margin-left:5px;" type="checkbox" name="phuongthuc[]" value="2">
						</td>
					</td>

					<td>
						<td><p style="margin-left: 30px;">Bằng điểm thi năng lực Quốc gia</p></td>
						<td>
							<input style="margin-left:5px;" type="checkbox" name="phuongthuc[]" value="4">
						</td>
					</td>

					<td>
						<td><p style="margin-left: 30px;">Xét tuyển thẳng</p></td>
						<td>
							<input style= "margin-left:5px;" type="checkbox" name="phuongthuc[]" value="3">
						</td>
					</td>



				</tr>


			</table>
            <p style="margin-top:5px;"><b>C. XÉT TUYỂN BẰNG ĐIỂM THI THPT QUỐC GIA</b></p>
			<p style=" font-style:italic;"><b style="font-style:normal;">17. Đăng ký bài thi/môn thi </b>(Thí sinh đăng ký dự thi bài thi nào thì đánh dấu "<b>X</b>" vào ô bài thi tương ứng.</p>

			<table style="margin-top:10px;">

				<tr>
					<td><p style="margin-left:30px;color:red;"><b>*Đăng ký bài thi:  </b></p></td>
					<td>
						<td><p style="margin-left:10px;">Tổ hợp bắt buộc (Toán, văn, ngoại ngữ)</p></td>
						<td>
							<input style="width:15px; margin-left:5px;" type="checkbox" name="tohop[]" value="3">
						</td>
					</td>


					<td>
						<td><p style="margin-left: 30px;">KHTN</p></td>
						<td>
							<input style="width:15px; margin-left:5px;" type="checkbox" name="tohop[]" value="1">
						</td>
					</td>

					<td>
						<td><p style="margin-left: 30px;">KHXH</p></td>
						<td>
							<input style="width:15px; margin-left:5px;" type="checkbox" name="tohop[]" value="2">
						</td>
					</td>


				</tr>


			</table>

            <br>
            <p style="color: red;">Tra cứu nhanh ngành khối theo quy định của trường</p>
            <table>
                <tr>
                    <td ><select style="width:250px;" name="" id="Nganh1">
						@foreach ($nganh as $item)
                            <option value="{{$item->manganh}}">{{$item->tennganh}}</option>
                        @endforeach
					</select>
				</td>
				<td >
					<select style="width:100px;" name="" id="Khoi1">
						@foreach ($khoi as $item)
                            <option value="{{$item->makhoi}}">{{$item->tenkhoi}}</option>
                        @endforeach
					</select>
				</td>
                </tr>
            </table>

            <br>

            <p><b>18. Thí sinh đăng ký nguyện vọng vào đại học</b></p>
			<p style="margin-left:30px;">- Các nguyện vọng xếp theo thứ tự ưu tiên từ trên xuống dưới (Nguyện vọng 1 là nguyện vọng ưu tiên cao nhất)</p></tr>
			<p style="margin-left:30px;">- Thí sinh đăng ký nguyện vọng nào không đúng với quy định của trường thì nguyện vọng đó sẽ không được hệ thống phần mềm của trường xét tuyển.</p>

			<table id="nv" class="order-list">
				<thead>
					<th>Thứ tự nguyện vọng</th>
					<th>Mã ngành</th>
					<th style="width:100px;">Khối</th>
					<td> <input  type="button" value="Thêm" id="btnadd"></td>
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
				<td><input  style="width:48px;" id="delete" class="danger" value="Xóa" type="button"></td>
				</tr>

				</tbody>
				<tfoot>

        </tfoot>
			</table>

            </tr>
            </table>


				<table style="margin-top:10px; margin-bottom:10px;">
				<tr>
					<td><p style="margin-left:10px;">Tổng số nguyện vọng (Bắt buộc phải ghi)</p></td>
					<td><input style="width:50px; margin-left:10px;" type="text" name="total"></td>
				</tr>
				</table>



				<p><b>D. XÉT TUYỂN BẰNG HỌC BẠ</b></p>

			<p>Sau khi tìm hiểu các quy định về tiêu chí và điều kiện xét tuyển của Nhà trường, tôi đăng ký xét tuyển vào trường:</p>
			<div class="dkhb" style="width:100%;height:180px;">
				<div class="dkhb1" style="width:50%;">
					<p><b>19. Các môn trong tổ hợp cần để xét tuyển học bạ</b></p>
			<div class="Xethb">

			<table class="order-list-diem" style="margin-top:10px;">
				<thead>
					<th>Môn học</th></th>
					<th>Điểm</th>

					<td> <input  type="button" value="Thêm" id="btnadd-diem"></td>
				</thead>
				<tbody>
				<tr>

				<td >
					<select style="width:100px;" name="mamon[]" value="mon">
						@foreach ($mon as $it)
                            <option value="{{$it->mamon}}">{{$it->tenmon}}</option>
                        @endforeach
					</select>
				</td>
				<td><input  style="width:100px;" type="text" name="diem[]"></td>
				<td><input  style="width:48px;" id="delete-diem" class="danger" value="Xóa" type="button"></td>
				</tr>

				</tbody>
			</table>
				</div>
				<div class="dkhb2" style="width:50%;">

					<div class="img" style="width:140px;margin-left:270px;margin-top:-40px;text-align:center;">
						<p style="width:230px;color:red;font-size:13px;"><b>* Thí sinh đính kèm bảng điểm học bạ (nếu đk bằng học bạ)</b></p>

                		<img id="uploadPreview2" style="width: 100px; height: 100px;margin-left:65px;" />
                		<input id="uploadImage2" type="file" class="form-control" name="imghocba" onchange="PreviewImage2();"style="margin-left:70px;" />
            		</div>
				</div>
			</div>
			</div>










            <p style="margin-top:30px;"><b>20. Thí sinh đăng ký nguyện vọng vào đại học</b></p>
			<p style="margin-left:30px;">- Các nguyện vọng xếp theo thứ tự ưu tiên từ trên xuống dưới (Nguyện vọng 1 là nguyện vọng ưu tiên cao nhất)</p></tr>
			<p style="margin-left:30px;">- Thí sinh đăng ký nguyện vọng nào không đúng với quy định của trường thì nguyện vọng đó sẽ không được hệ thống phần mềm của trường xét tuyển.</p>



            <table class="order-list-hb">
				<thead>
					<th>Thứ tự nguyện vọng</th>
					<th>Mã ngành</th>
					<th style="width:100px;">Khối</th>
					<td> <input  type="button" value="Thêm" id="btnadd-hb"></td>
				</thead>
				<tbody>
				<tr>
				<td><input type="text" name="manguyenvong2[]"></td>
				{{-- <td><input type="text" name="manganh2[]"></td>
				<td><input style="width:300px;" type="text" name="tennganh-hb"></td> --}}
                <td ><select style="width:250px;" name="manganh2[]" id="Nganh">
                    @foreach ($nganh as $item)
                        <option value="{{$item->manganh}}">{{$item->tennganh}}</option>
                    @endforeach
                </select>
            </td>
				<td >
					<select style="width:100px;" name="makhoi2[]" >
						@foreach ($khoi as $item)
                            <option value="{{$item->makhoi}}">{{$item->tenkhoi}}</option>
                        @endforeach
					</select>
				</td>
				<td><input  style="width:48px;" id="delete-hb" class="danger-hb" value="Xóa" type="button"></td>
				</tr>

				</tbody>
				<tfoot>

        </tfoot>
			</table>

            </tr>
            </table>
				<table style="margin-top:10px; margin-bottom:10px;">
				<tr>
					<td><p style="margin-left:10px;">Tổng số nguyện vọng (Bắt buộc phải ghi)</p></td>
					<td><input style="width:50px; margin-left:10px;" type="text" name="total"></td>
				</tr>
				</table>





				<b>E. XÉT TUYỂN THẲNG VÀO ĐẠI HỌC</b>
			<P>(Sử dụng cho thí sinh thuộc diện xét tuyển thẳng theo quy định tại các điểm a,b,c,d,đ,e, khoản 2 Điều 7 của Quy chế tuyển sinh)</P>
			<div class="dktt" style="width:100%;height:150px;margin-top:5px;">
					<div class="dktt1"style="width:100%;">
						<table>
							<tr>
								<th>21. Năm đoạt giải:</th>
								<th><input type="text" name="namdoatgiai"></th>
							</tr>
						</table>


						<p><b>22. Môn đoạt giải, loại giải, loại huy chương</b></p>
						<table style="margin-top:10px;">
							<tr >
								<td> <p style="margin-left:30px;">Loại giải, loại huy chương:</p></td>
								<th><input type="text" name="loaigiaihuychuong" ></th>
							</tr>
							<tr>
								<td ><p style="margin-left:30px;" >Môn đoạt giải:</p></td>
								<th><input type="text" name="mondoatgiai" style="margin-left:0px; "></th>

							</tr>
						</table>
						<table>
							<tr>
								<th>23. Trong đội tuyển Olympic khu vực và quốc tế môn:</th>

							</tr>
							<tr><th><input type="text "name="olympicmon"></th></tr>
						</table>
					</div>


					<div class="dktt2"style="width:100%;margin-top:-140px; margin-left:-140px;">
						<div class="img" style="width:135px;height:140px;margin-left:550px;text-align:center;">
                			<p style="color:red; font-size:13px;"><b>* thí sinh đính kèm giấy chứng nhận đoạt giải</b></p>
                			<img id="uploadPreview3" style="width: 100px; height: 100px;" />
                			<input id="uploadImage3" type="file" class="form-control" name="imgtuyenthang" onchange="PreviewImage3();"style="margin-left:20px;" />
            		</div>

					</div>
			</div>





			<p><b>24. Thí sinh đăng ký nguyện vọng vào đại học</b></p>
			<p style="margin-left:30px;">- Các nguyện vọng xếp theo thứ tự ưu tiên từ trên xuống dưới (Nguyện vọng 1 là nguyện vọng ưu tiên cao nhất)</p></tr>
			<p style="margin-left:30px;">- Thí sinh đăng ký nguyện vọng nào không đúng với quy định của trường thì nguyện vọng đó sẽ không được hệ thống phần mềm của trường xét tuyển.</p>

			<table class="order-list-tt">
				<thead>
					<th>Thứ tự nguyện vọng</th>
					<th>Mã ngành</th>
					<th style="width:100px;">Khối</th>
					<td> <input  type="button" value="Thêm" id="btnadd-tt"></td>
				</thead>
				<tbody>
				<tr>
				<td><input type="text" name="manguyenvong3[]"></td>
				{{-- <td><input type="text" name="manganh3[]"></td>
				<td><input style="width:300px;" type="text" name="tennganh-tt"></td> --}}
                <td ><select style="width:250px;" name="manganh3[]" id="Nganh">
                    @foreach ($nganh as $item)
                        <option value="{{$item->manganh}}">{{$item->tennganh}}</option>
                    @endforeach
                    </select>
                </td>
				<td >
					<select style="width:100px;" name="makhoi3[]" >
						@foreach ($khoi as $item)
                            <option value="{{$item->makhoi}}">{{$item->tenkhoi}}</option>
                        @endforeach
					</select>
				</td>
				<td><input  style="width:48px;" id="delete-tt" class="danger-tt" value="Xóa" type="button"></td>
				</tr>

				</tbody>
				<tfoot>

        </tfoot>
			</table>

            </tr>
            </table>

				<table style="margin-top:10px; margin-bottom:10px;">
				<tr>
					<td><p style="margin-left:10px;">Tổng số nguyện vọng (Bắt buộc phải ghi)</p></td>
					<td><input style="width:50px; margin-left:10px;" type="text" name="total"></td>
				</tr>
				</table>

		<p><b>F. XÉT TUYỂN BẰNG ĐIỂM THI NĂNG LỰC QUỐC GIA </b></p>




	    <table>
		<tr>
		<th>Điểm thi năng lực quốc gia</th>
		<td><input type="text" name="diemnangluc"></td>
		</tr>
	    </table>
		<div class="img" style="width:150px;height:170px;margin-left:0px;">
            <p style="color:red; font-size:13px; text-align:center;"><b>* Thí sinh đính kèm phiếu báo điểm thi năng lực</b></p>
            <img id="uploadPreview4" style="width: 100px; height: 100px;margin-left:20px;" />
            <input id="uploadImage4" type="file" class="form-control" name="imgnangluc" onchange="PreviewImage4();"style="margin-left:25px;" />
        </div>

	    <p><b>25. Thí sinh đăng ký nguyện vọng vào đại học</b></p>
			<p style="margin-left:30px;">- Các nguyện vọng xếp theo thứ tự ưu tiên từ trên xuống dưới (Nguyện vọng 1 là nguyện vọng ưu tiên cao nhất)</p></tr>
			<p style="margin-left:30px;">- Thí sinh đăng ký nguyện vọng nào không đúng với quy định của trường thì nguyện vọng đó sẽ không được hệ thống phần mềm của trường xét tuyển.</p>

	    <table class="order-list-nlqg">
				<thead>
					<th>Thứ tự nguyện vọng</th>
					<th>Mã ngành</th>
					<th style="width:100px;">Khối</th>
					<td> <input  type="button" value="Thêm" id="btnadd-nlqg"></td>
				</thead>
				<tbody>
				<tr>
				<td><input type="text" name="manguyenvong4[]"></td>
				{{-- <td><input type="text" name="manganh[4]"></td>
				<td><input style="width:300px;" type="text" name="tennganh-nlqg"></td> --}}
                <td ><select style="width:250px;" name="manganh4[]" id="Nganh">
                    @foreach ($nganh as $item)
                        <option value="{{$item->manganh}}">{{$item->tennganh}}</option>
                    @endforeach
                </select>
            </td>
				<td >
					<select style="width:100px;" name="makhoi4[]" >
						@foreach ($khoi as $item)
                            <option value="{{$item->makhoi}}">{{$item->tenkhoi}}</option>
                        @endforeach
					</select>
				</td>
				<td><input  style="width:48px;" id="delete-nlqg" class="danger-nlqg" value="Xóa" type="button"></td>
				</tr>

				</tbody>
				<tfoot>

        </tfoot>
			</table>

        </tr>
        </table>
				<table style="margin-top:10px; margin-bottom:10px;">
				<tr>
					<td><p style="margin-left:10px;">Tổng số nguyện vọng (Bắt buộc phải ghi)</p></td>
					<td><input style="width:50px; margin-left:10px;" type="text" name="total"></td>
				</tr>
				</table>







				<input style="margin-left:400px; color:white; width:100px;height:30px; font-size:18px; background-color:#609810;" type="submit" name="submit" value="Đăng ký">





		    </div>
		    </div>

        </div>


    </form>

<script>
$(document).ready(function(){

    $("#btnadd").click(function(){

        var row=$('<tr>');
		var col='';
		col += '<td><input type="text" name="manguyenvong1[]"></td>';
        col += '<td ><select style="width:250px;" name="manganh1[]" id="Nganh"> @foreach ($nganh as $item)<option value="{{$item->manganh}}">{{$item->tennganh}}</option>@endforeach</select></td>'
		col += '<td><select style="width:100px;" name="makhoi1[]" id="Khoi">@foreach ($khoi as $item)<option value="{{$item->makhoi}}">{{$item->tenkhoi}}</option>@endforeach</select></td>';
		col += '<td><input style="width:48px;" id="delete" class="danger" value="Xóa" type="button"></td>';
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
    $("#btnadd-diem").click(function(){
        var row=$('<tr>');
		var col='';
		col += '<td><select style="width:100px;" name="mamon[]" value="mon">@foreach ($mon as $it)<option value="{{$it->mamon}}">{{$it->tenmon}}</option>@endforeach</select></td>';
		col += '<td><input style="width:100px;" type="text" name="diem[]"></td>';

		col += '<td><input style="width:48px;" id="delete-diem" class="danger-diem" value="Xóa" type="button"></td>';
		row.append(col);
		$('table.order-list-diem').append(row);
    });
	$('table.order-list-diem').on('click','#delete-diem',function(event){
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
		col += '<td><input style="width:48px;" id="delete-hb" class="danger-hb" value="Xóa" type="button"></td>';
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
		col += '<td><input style="width:48px;" id="delete-tt" class="danger-tt" value="Xóa" type="button"></td>';
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
		col += '<td><input style="width:48px;" id="delete-nlqg" class="danger-nlqg" value="Xóa" type="button"></td>';
		row.append(col);
		$('table.order-list-nlqg').append(row);
    });
	$('table.order-list-nlqg').on('click','#delete-nlqg',function(event){
		$(this).closest('tr').remove();
	})
});
</script>

<script>
	// $('select').change(function() {

	// //var token=document.head.querySelector('meta[name="csrf-token"]').conten;
	// var token=document.head.querySelector('meta[name="csrf-token"]');

	// var va = $(this).children("option:selected").val();

	// var a = $(this).parent().closest('tr').find('td:nth-child(3)').find('select');
    // var op = $(this).parent().closest('tr').find('td:nth-child(3)').find('select').find('option');
	// $.ajax({
	// 	url:'/ajax/nganhkhoi/'+va,
	// 	type:'get',
	// 	data:{
	// 		id:va,
	// 		_token:token
	// 	},
	// 	success:function(data){
    //     b.remove();
	// 	a.append(data);

	// 	}
	// })

	// })




    $("#Nganh1").click(function(){

                var manganh = $(this).val();
                $.get("ajax/nganhkhoi/"+manganh, function(data){
                    //alert(manganh);
                    $("#Khoi1").html(data);
        })

    })



</script>

<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

    function PreviewImage0() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage0").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview0").src = oFREvent.target.result;
        };
    };

    function PreviewImage1() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage1").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview1").src = oFREvent.target.result;
        };
    };

    function PreviewImage2() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage2").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview2").src = oFREvent.target.result;
        };
    };

    function PreviewImage3() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage3").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview3").src = oFREvent.target.result;
        };
    };

    function PreviewImage4() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage4").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview4").src = oFREvent.target.result;
        };
    };

</script>


</body>
</html>
