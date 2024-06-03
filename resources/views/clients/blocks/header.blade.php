<div class="fhgksvfjsa">
    <div class="info_top">

        <ul class="top_header">
            <li class="top_header_li">
                Hỗ trợ trả góp 0%
            </li>
            <li class="top_header_li">
                Giao hàng siêu tốc
            </li>
            <li class="top_header_li">
                Bảo hành nhanh chóng
            </li>
            <li class="top_header_li">           
        Miễn phí giao hàng đơn từ 1.000.000đ
            </li>
            <li class="top_header_li">           
                Miễn phí quẹt thẻ
                    </li>
                    <li class="top_header_li">           
                       Hỗ trợ trả góp 0%
                            </li>
                
        </ul>
        {{-- <div class="bg_in1"> --}}
            {{-- <p class="p_infor"> --}}

                {{-- <span><i class="fa fa-envelope" aria-hidden="true"></i>Mu Sa Sa Liêm </span>
                <span><i class="fa fa-phone" aria-hidden="true"></i> DH51902901</span> --}}
              
            {{-- </p> --}}
        {{-- </div> --}}
    </div>
</div>
<div class="container1">
    <div class="info_top1">
        <table class="tableheader" border="0">
            <tr>
                <td width="20%">
                    <div class="logo">
                        <a href="/"><img
                                src="../../../storage/block/header/logo_chinh.png" height="50"
                                alt="header_logo" /></a>
                    </div>
                </td>
                <td width="45%">
                    <div style="margin-right:28px; cursor:pointer; padding:5px;">
                        {{-- <form action="" id="search-box">
                            <input type="text" id="search-text" placeholder="Tìm kiếm . . .">
                            <button id="search-btn"><i class="bi bi-search"></i></i></button>
                        </form> --}}

                        <a id="form-giohang"> <i class="bi bi-search"></i></a>

                    </div>
                </td>
                <td width="7%">
                    <div>

                        <ul class="navbar-nav ms-auto" style="display: -webkit-box;">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Register</a>
                            </li>
                        </ul>
{{-- if ifelse--}}
                        {{-- <div class="dropdown">
                            <a class="dropdown-toggle" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" >
                                <img src="https://cdn.discordapp.com/attachments/895584939368648756/1243238874965086308/image.png?ex=665e97ae&is=665d462e&hm=678bb404b2a03ed01eab018b1ddb3b0785549c037d7c2b1ce452a3fe9b86e58d&"
                                 alt="Dropdown Image" class="img-fluid" style="width: 40px; height:40px;     border-radius: 50%;">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div> --}}

                </td>
                <td width="3%">
                    <div>
                        <?php 
    $total = 0;

     ?>
                        <a id="form-giohang" href="/giohang/giohang">
                            <p class="giohangbienhinh"><?php echo $total;?></p>
                            <i class="bi bi-cart" ></i>
                        </a>
                            
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="container2">
    <div class="info_top2">
        <div class="menu__bar">
            <ul class="no-bullets">
                <li><a class="form-danhmuc1" href="/">Trang chủ</a></li>
                <li><a class="form-danhmuc1" href="/product/danhmuc/">Danh mục&nbsp;<i
                            class="bi bi-chevron-down"></i></a>
                    <div class="dropdown__menu dropdown_menu-7">
                        <ul>
                            <?php
   
    ?>
                            <li><a class="nameonmenu-1"
                                    href="/product/listtheloai/"></a>

                                <div class="dropdown__menu2 dropdown_menu-6">
                                    <ul>
                                        <?php
               
            ?>
                                        <li><a class="nameonmenu-2"
                                                href="/product/listnhasanxuat/"></a>
                                        </li>
                                        <!-- /////////// -->
                                        <?php
         
            ?>

                                    </ul>
                                </div>
                            </li>
                            <?php
    
    ?>
                            <!-- /////////// -->


                        </ul>
                    </div>
                </li>
                <li><a class="form-danhmuc1" href="/tintuc/tatca">Tin tức</a></li>
                <li><a class="form-danhmuc1" href="/index/lienhe">Liên hệ</a></li>
            </ul>
        </div>
    </div>

</div>