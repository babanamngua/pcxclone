            
    <ul class="nav menu">
        <li class="active"><a href="{{ route('dashboard')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ quản trị</a></li>
        <li class="parent">
            <a href="{{url('users')}}">
                <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down">
                    </use></svg></span> Quản lý nhân sự
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="" href="{{url('roles')}}">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Quản lý - Sự chấp thuận - Vai trò
                    </a>
                </li>
                <li>
                    <a class="" href="{{url('permissions')}}">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Quản lý - Vai trò
                    </a>
                </li>
            </ul>		    
        </li>
        <li class="parent ">
            <a href="{{ route('clients.index')}}" style="padding-left: 45px;">
                <span data-toggle="collapse" href="#sub-item-2"></span> Quản lý khách hàng
            </a>
        </li> 
        <li class="parent">
            <a href="{{ route('brand.index')}}">
                <span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down">
                    </use></svg></span> Quản lý - Danh mục
            </a>
            <ul class="children collapse" id="sub-item-3">
                <li>
                    <a class="" href="{{ route('category.index')}}">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Quản lý - Thể loại
                    </a>
                </li>
                <li>
                    <a class="" href="{{ route('type.index')}}">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Quản lý - Nhà sản xuất
                    </a>
                </li>
                <li>
                    <a class="" href="{{ route('component.index')}}">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Quản lý - Linh kiện
                    </a>
                </li>
            </ul>		    
        </li>
        <li class="parent ">
            <a href="{{ route('product.index')}}" style="padding-left: 45px;">
                <span data-toggle="collapse" href="#sub-item-4"></span> Quản lý sản phẩm
            </a>
        </li> 
        <li class="parent ">
            <a href="{{ route('orders.index')}}" style="padding-left: 45px;">
                <span data-toggle="collapse" href="#sub-item-5"></span> Quản lý đơn hàng
            </a>
        </li>
        <li class="parent ">
            <a href="{{ route('shippingmethods.index')}}" style="padding-left: 45px;">
                <span data-toggle="collapse" href="#sub-item-6"></span> Quản lý phương thức vận chuyển
            </a>
        </li>
        <li class="parent ">
            <a href="{{ route('articles.index')}}" style="padding-left: 45px;">
                <span data-toggle="collapse" href="#sub-item-7"></span> Quản lý bài viết
            </a>
        </li> 
        <li class="parent ">
            <a href="{{ route('product.index')}}" style="padding-left: 45px;">
                <span data-toggle="collapse" href="#sub-item-8"></span> Quản lý mã giảm giá
            </a>
        </li> 
        <li class="parent ">
            <a href="{{ route('product.index')}}" style="padding-left: 45px;">
                <span data-toggle="collapse" href="#sub-item-9"></span> Quản lý banner
            </a>
        </li> 
    </ul>