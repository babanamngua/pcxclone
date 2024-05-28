@extends('layouts.clients')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
<div class="container8">
    <div class="contain4">
        <div class="tenlistsanhpham">Trang chủ > chuot</div>
        <div class="contain4">
            <!-- left -->
            <div class="listsanphamleft">

                <div class="boliclistsanpham">Bộ lọc</div>
                <div class="boctinhtranglishlai">
                    <?php 
            $total=0;
 
            ?>
                    <div class="tinhtranglistsanpham"><i class="bi bi-justify-right"></i>TÌNH TRẠNG</div>
                    <ul>
                        <li>Còn hàng<a class="sohangcontrongkho">(<?php echo $total; ?>)</a></li>
                    </ul>
                </div>
                <div class="cachlishbentrai">-------------------------------</div>
                <div class="boctinhtranglishlai">
                    <div class="tinhtranglistsanpham"><i class="bi bi-justify-right"></i>THƯƠNG HIỆU</div>
                    <ul>
                        <?php 

?>
                    </ul>
                </div>
                <div class="cachlishbentrai">-------------------------------</div>
                <div class="boctinhtranglishlai">
                    <div class="tinhtranglistsanpham"><i class="bi bi-justify-right"></i>GIÁ (₫)</div>
                    <div class="price-input">
                        <div class="field">
                            <span>Min</span>
                            <input type="number" class="input-min" value="2500">
                        </div>
                        <div class="separator">-</div>
                        <div class="field">
                            <span>Max</span>
                            <input type="number" class="input-min" value="7500">
                        </div>
                    </div>
                    <div class="slider">
                        <div class="progress"></div>
                    </div>
                    <div class="range-input">
                        <input type="range" class="range-min" min="0" max="100000" value="0" step="100">
                        <input type="range" class="range-max" min="0" max="100000" value="100000" step="100">
                    </div>
                </div>
            </div>
        </div>

        <!-- right -->
        <div class="listsanphamright">
            <div class="tenvahinhanhlistsanpham">

                <div class="anhlistsanpham"><img
                        src="/public/uploads/loaisanpham/"
                        class="anhlistsanpham1"></div>

                <div class="motalistsanpham"></div>

            </div>
            <div class="sapxephienthi">
                <div class="hienthisoluong">
                    <div class="menu__bar1">
                        <ul class="no-bullets">
                            <?php 
            $total=0;

     ?>
                            <li><a class="form-listsanpham"><?php echo $total?> sản phẩm</a></li>
                            <li><a class="form-listsanpham">Hiển thị: mỗi trang&nbsp;<i
                                        class="bi bi-chevron-down"></i></a>
                                <div class="dropdown__list1 dropdown_menu-6">
                                    <ul>
                                        <li><a class="nameonlist-3" href="#">4 mỗi trang</a></li>
                                        <li><a class="nameonlist-3" href="#">8 mỗi trang</a></li>
                                        <li><a class="nameonlist-3" href="#">12 mỗi trang</a></li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="sanphamlistsanpham">
                <?php 
        
                        
            ?>
                <!-- the real 1 -->
                <div class="theloaidanhmuc11">
                    <div class="bocbestsellers">
                        <!-- <div class="iconbestsalers">sale</div>  -->
                        <div class="anhbestsellers"><a
                                href="/product/chitietsanpham/"><img
                                    src="/public/uploads/sanpham/"
                                    class="anhtrongbestsellers"></a></div>
                        <div><a href="#" class="theloaibestsellers"></a></div>
                        <div><a href="/product/chitietsanpham/"
                                class="tenbestsellers"></a></div>
                        <div><a class="sobestsellersold"></a></div>
                        <!-- <div><a class="sobestsellerssale">1.150.00d</a></div> -->
                    </div>
                </div>
                <?php 
                    
    
            ?>
                <!-- //// -->

            </div>

        </div>

        <div class="listtrang">

            <!-- phan trang o day, chua lam` -->
        </div>
    </div>
</div>
</div>
</div>
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection