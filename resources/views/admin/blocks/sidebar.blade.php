            
    <ul class="nav menu">
        <li class="active"><a href="{{ route('homeAdmin')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ quản trị</a></li>
        <li class="parent ">
            <a href="0/khachhangController/list_khachhang">
                <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý khách hàng
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a href="0/khachhangController/add_khachhang">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>
                        Thêm mới
                    </a>
                </li>
            </ul>			
        </li>
        <li class="parent ">
            <a >
                <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý danh mục
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li>
                    <a class="" href="{{ route('category.index')}}">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Quản lý loại sản phẩm
                    </a>
                </li>
                <li>
                    <a class="" href="{{ route('brand.index')}}">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Quản lý nhà sản xuất
                    </a>
                </li>
                <li>
                    <a class="" href="{{ route('component.index')}}">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Quản lý linh kiện
                    </a>
                </li>
            </ul>		
                
        </li>
        <li class="parent ">
            <a href="{{ route('product.index')}}">
                <span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý sản phẩm
            </a>
            {{-- <ul class="children collapse" id="sub-item-3">
                <li>
                    <a class="" href="0/sanphamController/add_sanpham">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                    </a>
                </li>

            </ul> --}}
        </li> 
     {{-- <li class="parent ">
            <a href="0/baivietController/list_baiviet">
                <span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý bài viết
            </a>
            <ul class="children collapse" id="sub-item-4">
                <li>
                    <a class="" href="0/baivietController/add_baiviet">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                    </a>
                </li>

            </ul>				
        </li>
        <li class="parent ">
            <a href="0/donhangController/list_donhang">
                <span data-toggle="collapse" href="#sub-item-5"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg></use></svg></span> Quản lý đơn hàng
            </a>
               
        </li>
        <li class="parent ">
            <a href="0/binhluanController/list_binhluan">
                <span data-toggle="collapse" href="#sub-item-5"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg></span> Quản lý bình luận
            </a>

        </li>
        <li class="parent ">
            <a href="0/khuyenmaiController/list_khuyenmai">
                <span data-toggle="collapse" href="#sub-item-6"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý khuyến mãi
            </a>
            <ul class="children collapse" id="sub-item-6">
                <li>
                    <a class="" href="0/khuyenmaiController/add_khuyenmai">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                    </a>
                </li>

            </ul>			
        </li>
        <!-- <li class="parent ">
            <a href="0/nhasanxuatController/list_nhasanxuat">
                <span data-toggle="collapse" href="#sub-item-7"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý nhà sản xuất
            </a>
            <ul class="children collapse" id="sub-item-7">
                <li>
                    <a class="" href="0/nhasanxuatController/add_nhasanxuat">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                    </a>
                </li>

            </ul>			
        </li> -->
       

        <li role="presentation" class="divider"></li>
        <li><a href="0/login/logout"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Đăng xuất</a></li>
    </ul>