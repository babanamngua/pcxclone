<div id="fhgksvfjsa" class="fhgksvfjsa" style="position: fixed;z-index: 40; top: 0px;">
    <div class="info_top">
        <ul class="top_header">
            <li class="top_header_li">Hỗ trợ trả góp 0%</li>
            <li class="top_header_li">Giao hàng siêu tốc</li>
            <li class="top_header_li">Bảo hành nhanh chóng</li>
            <li class="top_header_li">Miễn phí giao hàng đơn từ 1.000.000đ</li>
            <li class="top_header_li">Miễn phí quẹt thẻ</li>
            <li class="top_header_li">Hỗ trợ trả góp 0%</li>
        </ul>
    </div>
</div>

<div id="container1" class="container1" style="position: fixed; z-index: 50; top: 24px;">
    <div class="info_top1">
        <table class="tableheader" border="0">
            <tr>
                <td width="18%" class="sword-sheath" style="position: relative;z-index: 50;">
                    <div class="logo" style="background-color: var(--mauchudao-color);width: 96.3%;">
                        <a href="/"><img src="../../../storage/block/header/logo_chinh.png" height="50" alt="header_logo" /></a>
                    </div>
                </td>
                <td width="20%" class="sword-blade sword-out" style="position: relative; z-index: 40; padding-right: 3%; cursor: context-menu;">
                    <a id="kaskousski" class="dawdawdavsdv" >Danh mục&nbsp;<i class="bi bi-chevron-down"></i></a>
                    <a class="dawdawdavsdv" href="{{route('tintuc')}}">Tin tức</a>
                    <a class="dawdawdavsdv" href="{{route('lienhe')}}">Liên hệ</a>
                </td>
                <td width="45%">
                    <div style="margin-right:18px; cursor:pointer; padding:0px;">
                        <button id="search-button" style="padding: 0px 10px;">
                            <a id="form-giohang"><i class="bi bi-search"></i></a>
                        </button>
                    </div>
                </td>
                <td width="7%">
                    <div>
                        @if (Route::has('login'))
                            @auth
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="border:0px; background:none;"
                                    >
                                        {{ Auth::user()->name }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{route('profile.orderclients')}}">Đơn hàng</a></li>
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
                                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                    @if (Route::has('register'))
                                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                                    @endif
                                </ul>
                            @endauth
                        @endif
                    </div>
                </td>
                <td width="3%">
                    <div>
                        <a id="form-giohang" href="{{ route('cart.index') }}">
                            @if($cartCount > 0)
                                <p class="giohangbienhinh">{{ $cartCount }}</p>
                            @else
                                <p class="giohangbienhinh">0</p>
                            @endif
                            <i class="bi bi-cart"></i>
                        </a>
                        <input type="hidden" id="cart-count" value="{{ $cartCount }}">
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="container2" style="margin-top: 80px;">
    <div class="info_top2">
        <div class="menu__bar">
            <ul class="no-bullets">
                <li><a class="form-danhmuc1" href="/">Trang chủ</a></li>
                <li><a class="form-danhmuc1" id="kaskousski1">Danh mục&nbsp;<i class="bi bi-chevron-down"></i></a></li>
                <li><a class="form-danhmuc1" href="{{route('tintuc')}}">Tin tức</a></li>
                <li><a class="form-danhmuc1" href="{{route('lienhe')}}">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</div>
{{-- search 0verlay --}}
<div id="search-overlay" class="overlay">
    <div class="overlay-content">
        <form action="{{ route('products.search') }}" method="GET" id="search-form">
            <div class="overlay-contentt">
                <input type="text" name="q" placeholder="Tìm..." id="search-input" value="{{ request('q') }}">
                <span class="clear-btn" id="clear-btn">xóa</span>
                <span class="closebtn" id="close-button">&times;</span>
            </div>
            <button type="submit" id="search-button" style="padding: 0px 10px;"><i class="bi bi-search"></i></button>
        </form>
        <div class="items mb-4" id="search-results"></div>
    </div>
</div>
{{-- menu header 0verlay --}}
<div id="category-overlay" class="overlay">
    <div class="overlay-content1">
        <div>
            <ul>
                @foreach($category2 as $category)
                    <li><a href="{{route('collections.category1',['category' => $category->category_name])}}">{{$category->category_name}}</a>
                        <div>
                            <ul>
                                @foreach($brand1 as $brand)
                                    @if($category->category_id == $brand->category_id)
                                        <li><a href="{{route('collections.category',['category' => $category->category_name,'brand' => $brand->brand_name])}}">{{$brand->brand_name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endforeach
                <li><a href="">Linh kiện</a>

                <div>
                    <ul>
                        @foreach($category1 as $category)
                            <li><a href="{{route('collections.category1',['category' => $category->category_name])}}">{{$category->category_name}}</a>
                                <div>
                                    <ul>
                                        @foreach($brand1 as $brand)
                                            @if($category->category_id == $brand->category_id)
                                                <li>
                                                    <a href="{{route('collections.category',['category' => $category->category_name,'brand' => $brand->brand_name])}}">{{$brand->brand_name}}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        </div>
    </div>
</div>

{{------------------------------------------------ css ------------------------------------------------}}
<style>
.dawdawdavsdv{
        text-decoration: none;
        margin: 8px;
        color: white;
        cursor: pointer;
}

@keyframes drawSword {
    from {
        transform: translateX(-100%);
        opacity: 1;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes sheathSword {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(-100%);
        opacity: 1;
    }
}

.sword-in {
    animation: drawSword 1s forwards;
}

.sword-out {
    animation: sheathSword 1s forwards;
}
</style>
{{------------------------------------------------ script ------------------------------------------------}}
<script>
        var scrollThreshold = 100; // Đơn vị là pixel
        var swordBlade = document.querySelector('.sword-blade');

    window.addEventListener('scroll', function() {
        if (window.scrollY > scrollThreshold) {
            container1.style.top = '0px'; // Đưa container1 lên đầu
            swordBlade.classList.remove('sword-out');
            swordBlade.classList.add('sword-in');
        } else {
            container1.style.top = '24px'; // Đưa container1 ra khỏi màn hình
            swordBlade.classList.remove('sword-in');
            swordBlade.classList.add('sword-out');
        }
    });
</script>
<script>
    const searchButton = document.getElementById('search-button');
    const closeButton = document.getElementById('close-button');
    const searchOverlay = document.getElementById('search-overlay');
    const overlayContent = document.querySelector('.overlay-content');
    const clearBtn = document.getElementById('clear-btn');
    const searchInput = document.getElementById('search-input');

    const categoryButton = document.getElementById('kaskousski');
    const categoryButton1 = document.getElementById('kaskousski1');
    const categoryOverlay = document.getElementById('category-overlay');

    categoryButton.onclick = function() {
    categoryOverlay.style.display = 'block';
    categoryOverlay.style.zIndex = '999';
    document.body.style.overflowY = 'hidden'; // Hide body scroll
}
    categoryButton1.onclick = function() {
    categoryOverlay.style.display = 'block';
    categoryOverlay.style.zIndex = '999';
    document.body.style.overflowY = 'hidden'; // Hide body scroll
}
categoryOverlay.addEventListener('mousemove', function(event) {
    const rect = categoryOverlay.querySelector('.overlay-content1').getBoundingClientRect();
        if (event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event.clientY > rect.bottom) {
            categoryOverlay.classList.add('exit-cursor');
        } else {
            categoryOverlay.classList.remove('exit-cursor');
        }
    });
    categoryOverlay.addEventListener('click', function(event) {
    const rect = categoryOverlay.querySelector('.overlay-content1').getBoundingClientRect();
    if (event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event.clientY > rect.bottom) {
        categoryOverlay.style.display = 'none';
        document.body.style.overflowY = 'auto';
    }
});

    searchButton.onclick = function() {
        searchOverlay.style.display = 'block';
        searchOverlay.style.zIndex = '999';
        document.body.style.overflowY = 'hidden'; // Đặt overflow-y: hidden cho body
    }

    closeButton.onclick = function() {
        searchOverlay.style.display = 'none';
        document.body.style.overflowY = 'auto';
    }

    clearBtn.onclick = function() {
        searchInput.value = '';
        document.getElementById('search-results').innerHTML = '';
        clearBtn.classList.remove('show');
    }

    searchInput.oninput = function() {
        if (searchInput.value) {
            clearBtn.classList.add('show');
        } else {
            clearBtn.classList.remove('show');
        }
    }

    searchOverlay.addEventListener('mousemove', function(event) {
        const rect = overlayContent.getBoundingClientRect();
        if (event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event.clientY > rect.bottom) {
            searchOverlay.classList.add('exit-cursor');
        } else {
            searchOverlay.classList.remove('exit-cursor');
        }
    });

    searchOverlay.addEventListener('click', function(event) {
        const rect = overlayContent.getBoundingClientRect();
        if (event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event.clientY > rect.bottom) {
            searchOverlay.style.display = 'none';
            document.body.style.overflowY = 'auto';
        }
    });

    document.getElementById('search-input').addEventListener('input', function() {
        var query = this.value;
        if (query.length > 0) {
            fetch('/searching?query=' + query)
                .then(response => response.json())
                .then(data => {
                    var itemsDiv = document.getElementById('search-results');
                    itemsDiv.innerHTML = '';
                    if (data.products.length > 0) {
                        data.products.forEach(function(product) {
                            var priceRange = data.priceRanges[product.product_id];
                            var priceText = "No price available";
                            if (priceRange) {
                                if (priceRange.single) {
                                    priceText = formatCurrency(priceRange.price);
                                } else {
                                    priceText = formatCurrency(priceRange.min) + ' - ' + formatCurrency(priceRange.max);
                                }
                            }

                            var itemDiv = document.createElement('div');
                            itemDiv.className = 'mb-2';
                            itemDiv.style.padding = '10px';
                            itemDiv.innerHTML = `
                                <a href="/products/${product.product_id}" class="product-link">
                                    <img src="/storage/products/${product.product_name}/${product.url_name}" class="product-img" alt="${product.product_name}">
                                    <div class="product-name-under">
                                        <div class="product-name">${product.product_name}</div>
                                    </div>
                                    <div class="product-price">${priceText}</div>
                                </a>
                            `;
                            itemsDiv.appendChild(itemDiv);
                        });
                    } else {
                        itemsDiv.innerHTML = '<p style="text-align: center;">No results found</p>';
                    }
                });
        } else {
            document.getElementById('search-results').innerHTML = '';
        }
    });

    function formatCurrency(value) {
        if (isNaN(value)) {
            return "Invalid price";
        }
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
    }

    document.getElementById('search-input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            document.getElementById('search-form').submit();
        }
    });
</script>
