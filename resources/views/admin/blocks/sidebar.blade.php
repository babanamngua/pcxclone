            
    <ul class="nav menu">
        <li class="active"><a href="{{ route('homeAdmin')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ quản trị</a></li>
        <li class="parent ">
            <a >
                <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down">
                    </use></svg></span> Quản lý nhân sự
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li>
                    <a class="" href="{{ route('roles.index')}}">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Quản lý vai trò
                    </a>
                </li>
            </ul>		    
        </li>
        <li class="parent ">
            <a >
                <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down">
                    </use></svg></span> Quản lý danh mục
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
                <span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down">
                    </use></svg></span> Quản lý sản phẩm
            </a>
        </li> 
    </ul>