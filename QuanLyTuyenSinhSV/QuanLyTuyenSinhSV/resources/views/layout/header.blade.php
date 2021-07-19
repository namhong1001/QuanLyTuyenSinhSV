 <!-- Navigation -->
 <nav style="background-color:#609810;height:50px;margin-top:-70px;" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <?php
                $dk = DB::table('attribute')->where('loaiattribute','btnDangKyHoSo')->get();
                foreach($dk as $item){
                    if($item->giatri == "on"){
                        if(Auth::check()){
                            $idu = Auth::user()->id;
                        $h = DB::table('hoso')->where('iduser',$idu)->first();
                        if($h === null){ ?>
                            <a class="navbar-brand" href="dangkyhoso"  style="color:white;font-size:16px;">Đăng ký xét tuyển</a>
                            <?php
                        } else{
                            ?>
                            <button style="color: white; margin-top:10px" disabled>Đăng ký xét tuyển</button>
                            <?php
                        }
                        }
                        ?>

                        <?php
                    }
                }
            ?>


        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
            <ul class="nav navbar-nav">
                <li>
                    <a href="#"  style="color:white;font-size:16px;">Giới thiệu</a>
                </li>
                <li>
                    <a href="https://dlu.edu.vn/lien-he-voi-truong-dai-hoc-da-lat/"  style="color:white;font-size:16px;">Liên hệ</a>
                </li>
            </ul>

            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default"  style="color:black;font-size:14px;" >Tìm kiếm</button>
            </form>

            <ul class="nav navbar-nav pull-right " style="">
                <li>
                    <a href="signin"  style="color:white;font-size:16px;">Đăng ký</a>
                </li>
                <li>
                    <a href="login"  style="color:white;font-size:16px;">Đăng nhập</a>
                </li>
                <li>
                    <a>
                        <span class ="glyphicon glyphicon-user"></span>
                        @if(Auth::check())
                            {{Auth::user()->name}}
                        @endif
                    </a>
                </li>

                <li>
                    <a href="logout"  style="color:white;font-size:16px;">Đăng xuất</a>
                </li>

            </ul>
        </div>



        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
