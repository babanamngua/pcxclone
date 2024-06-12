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
                    <div style="margin-right:18px; cursor:pointer; padding:0px;">
                        {{-- <form action="" id="search-box">
                            <input type="text" id="search-text" placeholder="Tìm kiếm . . .">
                            <button id="search-btn"><i class="bi bi-search"></i></i></button>
                        </form> --}}

                        <button id="search-button" style="padding: 0px 10px;"><a id="form-giohang"><i class="bi bi-search"></i></a></button>

                    </div>
                </td>
                <td width="7%">
                    <div>
                        @if (Route::has('login'))
                        @auth
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{route('profile.edit')}}">{{ __('Profile') }}</a></li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                <li>
                                    <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                                </li>
                            </form>
                            </ul>
                        </div>
                        @else
                            <ul class="navbar-nav ms-auto" style="display: -webkit-box;">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            </ul>
                            @endif
                        @endauth
                    </nav>
                @endif
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
                        <a id="form-giohang" href="{{route('cart.index')}}">
                            <p class="giohangbienhinh">{{ count((array) session('cart')) }}</p>
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
<div id="search-overlay" class="overlay">
    <div class="overlay-content">
        <div class="overlay-contentt">
        <input type="text" placeholder="Tìm..." id="search-input">
        <span class="clear-btn" id="clear-btn">xóa</span>
        <span class="closebtn" id="close-button">&times;</span>
    </div>
    </div>
</div>