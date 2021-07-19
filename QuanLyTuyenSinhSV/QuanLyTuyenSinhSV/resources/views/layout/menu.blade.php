<div class="col-md-3 ">
    <ul class="list-group" id="menu" style="margin-left:-104px; margin-top:-10px;width:250px;">
        <li href="#" class="list-group-item menu1 active" style="background-color:#218500; border-color:white; color:white; font-size:18px;font-weight:bold;">
            Menu
        </li>
         <?php
            //Chi tiết hồ sơ
            if(Auth::check()){
                $iduser = Auth::user()->id;
                $hoso = DB::table('hoso')->where('iduser',$iduser)->first();
                if($hoso === null){
                    ?>
                    {{-- <li  class="list-group-item menu1" style="background-color:#609810; border-color:white; color:white; font-size:16px;font-weight:bold;">
                        <a href="" style="color:white;" >Chi tiết hồ sơ</a>
                    </li> --}}
                    <?php
                }else{
                    $hoso = DB::table('hoso')->where('iduser',$iduser)->get();
                    foreach ($hoso as $item) {
                        $mahoso = $item->mahoso;
                    }
                    ?>
                    <li  class="list-group-item menu1" style="background-color:#609810; border-color:white; color:white; font-size:16px;font-weight:bold;;">
                        <a href="chitiethoso/{{$mahoso}}"  style="color:white;"> Chi tiết hồ sơ</a>
                    </li>
                    <?php

                }
            }
        ?>

<?php
//Chỉnh sửa hồ sơ
$dk = DB::table('attribute')->where('loaiattribute','btnChinhSuaHoSo')->get();
foreach($dk as $item){
    if($item->giatri == "on"){
        if(Auth::check()){
        $iduser = Auth::user()->id;
        $hoso = DB::table('hoso')->where('iduser',$iduser)->first();
        if($hoso === null){
            ?>
            {{-- <li  class="list-group-item menu1" style="background-color:#609810; border-color:white; color:white; font-size:16px;font-weight:bold;">
                <a href="" style="color:white;" >Chỉnh sửa hồ sơ</a>
            </li> --}}
            <?php
        }else{
            $hoso = DB::table('hoso')->where('iduser',$iduser)->get();
            foreach ($hoso as $item) {
                $mahoso = $item->mahoso;
            }

        ?>
        <li  class="list-group-item menu1" style="background-color:#609810; border-color:white; color:white; font-size:16px;font-weight:bold;;">
            <a href="chinhsuahoso/{{$mahoso}}"  style="color:white;"> Chỉnh sửa hồ sơ</a>
        </li>
        <?php
        }
    }
}
}
    ?>

<?php
//Chỉnh sửa nguyện vọng
$dk = DB::table('attribute')->where('loaiattribute','btnChinhSuaNguyenVong')->get();
foreach($dk as $item){
    if($item->giatri == "on"){
        if(Auth::check()){
        $iduser = Auth::user()->id;
        $hoso = DB::table('hoso')->where('iduser',$iduser)->first();
        if($hoso === null){
            ?>
            {{-- <li  class="list-group-item menu1" style="background-color:white; border-color:white; color:white; font-size:16px;font-weight:bold;">
                <a href="" style="color:#609810;">Chỉnh sửa nguyện vọng</a>
            </li> --}}
            <?php
        }else{
            $hoso = DB::table('hoso')->where('iduser',$iduser)->get();
            foreach ($hoso as $item) {
                $mahoso = $item->mahoso;
            }
        ?>
        <li  class="list-group-item menu1" style="background-color:#609810; border-color:white; color:white; font-size:16px;font-weight:bold;;">
            <a href="chinhsuanguyenvong/{{$mahoso}}"  style="color:white;"> Chỉnh sửa nguyện vọng</a>
        </li>
        <?php

            }
        }
    }
}
        ?>

        <li a href="https://dlu.edu.vn/chuong-trinh-dao-tao-va-de-cuong-chi-tiet-hoc-phan-theo-cdr-cdio-cac-nganh-dai-hoc/" class="list-group-item menu1 active" style="background-color:#609810; border-color:white; color:white; font-size:16px;font-weight:bold;">Chương trình đào tạo</li>
        <li a href="#" class="list-group-item menu1 active" style="background-color:#609810; border-color:white; color:white; font-size:16px;font-weight:bold;">Quy trình nhập học</li>
        <li a href="https://dlu.edu.vn/thong-tin-tuyen-sinh-dai-hoc-he-chinh-quy-nam-2021/" class="list-group-item menu1 active" style="background-color:#609810; border-color:white; color:white; font-size:16px;font-weight:bold;">Thông tin tuyển sinh</li>
        <li a href="#" class="list-group-item menu1 active" style="background-color:#609810; border-color:white; color:white; font-size:16px;font-weight:bold;">Danh sách khoa</li>
    </ul>
</div>
