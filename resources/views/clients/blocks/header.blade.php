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
                        <a href="/"><img src="../../../storage/block/header/logo_chinh.png" height="50"
                                alt="header_logo" /></a>
                    </div>
                </td>
                <td width="20%" class="sword-blade sword-out"
                    style="position: relative; z-index: 40; padding-right: 3%; cursor: context-menu;">
                    <a id="kaskousski" class="dawdawdavsdv">Danh mục&nbsp;<i class="bi bi-chevron-down"></i></a>
                    <a class="dawdawdavsdv" href="{{ route('tintuc') }}">Tin tức</a>
                    <a class="dawdawdavsdv" href="{{ route('lienhe') }}">Liên hệ</a>
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
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                        style="border:0px; background:none;">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ route('profile.orderclients') }}">Đơn hàng</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
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
                                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endif
                                </ul>
                            @endauth
                        @endif
                    </div>
                </td>
                <td width="3%">
                    <div>
                        <a id="form-giohang" href="{{ route('cart.index') }}">
                            @if ($cartCount > 0)
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
                <li><a class="form-danhmuc1" href="{{ route('tintuc') }}">Tin tức</a></li>
                <li><a class="form-danhmuc1" href="{{ route('lienhe') }}">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</div>
{{-- search 0verlay --}}
<div id="search-overlay" class="overlay">
    <div class="overlay-content">
        <form action="{{ route('products.search') }}" method="GET" id="search-form">
            <div class="overlay-contentt">
                <input type="text" name="q" placeholder="Tìm..." id="search-input"
                    value="{{ request('q') }}">
                <span class="clear-btn" id="clear-btn">xóa</span>
                <span class="closebtn" id="close-button">&times;</span>
            </div>
            <button type="submit" id="search-button" style="padding: 0px 10px;"><i
                    class="bi bi-search"></i></button>
        </form>
        <div class="items mb-4" id="search-results"></div>
    </div>
</div>
{{-- menu header 0verlay --}}
<div id="category-overlay" class="overlay">
    <div class="benngoai">
        <div class="overlay-content1">
            <span class="closebtn" id="close-button1"
                style="margin: -2px;margin-bottom: -14px;border: 1px solid #0000004d;border-radius: 5px;padding: 7px 14px;background-color: darkgray;">&times;</span>
            <div class="overlay-content1-doubleshock">
                <ul>
                    @foreach ($category2 as $category)
                        <li class="category-item" style="cursor: pointer;"
                            data-category-id="{{ $category->category_id }}">
                            {{ $category->category_name }}
                            @php
                                $hasBrand = false;
                                foreach ($brand1 as $brand) {
                                    if ($category->category_id == $brand->category_id) {
                                        $hasBrand = true;
                                        break;
                                    }
                                }
                            @endphp
                            @if ($hasBrand)
                            <span class="glyphicon glyphicon-chevron-right icon-circle">></span>
                            @endif
                        </li>
                    @endforeach
                    {{-- @foreach ($c0mponent as $component)
                        <li>{{ $component->component_name }}</li>
                        @foreach($categorycomponent as $categorycomponentt)
                            @if ($component->component_id == $categorycomponentt->component_id)
                                <li>{{ $categorycomponentt->category_name }}</li>
                                @foreach ($brand1 as $brand3)
                                    @if ($categorycomponentt->category_id == $brand3->category_id)
                                        <li>{{ $brand3->brand_name }}</li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endforeach --}}
                </ul>
            </div>
            <div hidden id="category-id-display">
                @php
                    $categoryid = $category2->first()->category_id;
                @endphp
                {{ $categoryid }}
            </div>
        </div>
        {{-- </div> --}}
        {{-- <div class="benngoai" style="display: flex;"> --}}
        <div id="overlay-content2" class="overlay-content2" style="display: none;">
            <div style="margin: 40px 100px 100px 25px;">
                <ul id="brand-list">
                    @foreach ($brand1 as $brand)
                        @if ($categoryid == $brand->category_id)
                            <li>
                                <a
                                    href="{{ route('collections.category', ['category' => $category2->first()->category_name, 'brand' => $brand->brand_name]) }}">
                                    {{ $brand->brand_name }}
                                </a>
                            </li>
                        @endif
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>


{{-- ---------------------------------------------- css ---------------------------------------------- --}}
<style>
    .dawdawdavsdv {
        text-decoration: none;
        margin: 8px;
        color: white;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
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

    .overlay-content1-doubleshock {
        font-size: larger;
        margin: 25px 0px;
    }

    .overlay-content1-doubleshock ul {
        list-style-type: none;
    }

    .overlay-content1-doubleshock ul li {
        margin: 10px 0px;
        font-size: x-large;
    }


    /* CSS cho li:hover nếu cần */
    .overlay-content1-doubleshock ul li:hover {
        color: rgb(0, 0, 0);
        /* Màu chữ mới khi di chuột qua */
        text-decoration: underline;
        transition: color 0.3s;
        /* Tạo hiệu ứng chuyển đổi mượt */
    }



    .overlay-content1-doubleshock ul li:hover .icon-circle {
        color: rgb(255, 255, 255);
        /* Thay đổi màu biểu tượng khi hover */
        transition: color 0.3s;
        background-color: black;
    }

    .benngoai {
        display: flex;
        width: auto;
        position: absolute;
    }

    #brand-list {
        list-style-type: none;

    }

    #brand-list li a {
        color: black;
        text-decoration: unset;
    }
    .icon-circle {
        float: right;
        margin: 8px 25px;
        display: inline-block;
        width: 20px; /* Điều chỉnh kích thước hình tròn */
        height: 20px; /* Điều chỉnh kích thước hình tròn */
        line-height: 17px; /* Điều chỉnh độ cao dòng để căn giữa icon */
        text-align: center; /* Căn giữa icon */
        border-radius: 50%; /* Tạo hình tròn */
        border: 1px solid #ccc; /* Đường viền */
        font-size: 12px; /* Điều chỉnh kích thước biểu tượng */
        font-weight: 700;
    }
</style>
{{-- ---------------------------------------------- script ---------------------------------------------- --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryItems = document.querySelectorAll('.category-item');
        const overlayContent2 = document.getElementById('overlay-content2');
        const brandList = document.getElementById('brand-list');
        const categories = @json($category2);
        const brands = @json($brand1);

        categoryItems.forEach(item => {
            item.addEventListener('click', function() {
                const selectedCategoryId = this.getAttribute('data-category-id');
                const selectedCategory = categories.find(cat => cat.category_id ==
                    selectedCategoryId);
                const filteredBrands = brands.filter(brand => brand.category_id ==
                    selectedCategoryId);
                // Update category id display
                document.getElementById('category-id-display').innerText = selectedCategoryId;
                // Update brand list
                brandList.innerHTML = '';
                filteredBrands.forEach(brand => {
                    const brandListItem = document.createElement('li');
                    const brandImg = document.createElement('img');
                    brandImg.src = `/storage/brand/${brand.url_name}`;
                    brandImg.style.margin = '10px';
                    brandImg.height = 45;

                    const brandLink = document.createElement('a');
                    brandLink.href =
                        `/collections/${selectedCategory.category_name}-${brand.brand_name}`;
                    brandLink.innerText = brand.brand_name;

                    brandListItem.appendChild(brandImg);
                    brandListItem.appendChild(brandLink);
                    brandList.appendChild(brandListItem);
                });
                // Show overlay content 2
                overlayContent2.style.display = 'block';
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('.category-item').forEach(item => {
            item.addEventListener('click', function() {
                let categoryId = this.getAttribute('data-category-id');
                document.getElementById('category-id-display').innerText = categoryId;
            });
        });
    });
</script>
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
    const closeButton1 = document.getElementById('close-button1');
    const searchOverlay = document.getElementById('search-overlay');
    const overlayContent = document.querySelector('.overlay-content');
    const overlayContent2 = document.getElementById('overlay-content2');
    const clearBtn = document.getElementById('clear-btn');
    const searchInput = document.getElementById('search-input');

    const categoryButton = document.getElementById('kaskousski');
    const categoryButton1 = document.getElementById('kaskousski1');
    const categoryOverlay = document.getElementById('category-overlay');
    const brandOverlay = document.getElementById('brand-overlay');

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
        const rect = categoryOverlay.querySelector('.benngoai').getBoundingClientRect();
        if (event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event
            .clientY > rect.bottom) {
            categoryOverlay.classList.add('exit-cursor');
        } else {
            categoryOverlay.classList.remove('exit-cursor');
        }
    });
    categoryOverlay.addEventListener('click', function(event) {
        const rect = categoryOverlay.querySelector('.benngoai').getBoundingClientRect();
        if (event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event
            .clientY > rect.bottom) {
            categoryOverlay.style.display = 'none';
            overlayContent2.style.display = 'none';
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
        // categoryOverlay.style.display = 'none';
        document.body.style.overflowY = 'auto';
    }
    closeButton1.onclick = function() {
        categoryOverlay.style.display = 'none';
        overlayContent2.style.display = 'none';
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
        if (event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event
            .clientY > rect.bottom) {
            searchOverlay.classList.add('exit-cursor');
        } else {
            searchOverlay.classList.remove('exit-cursor');
        }
    });

    searchOverlay.addEventListener('click', function(event) {
        const rect = overlayContent.getBoundingClientRect();
        if (event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event
            .clientY > rect.bottom) {
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
                                    priceText = formatCurrency(priceRange.min) + ' - ' +
                                        formatCurrency(priceRange.max);
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
        return new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(value);
    }

    document.getElementById('search-input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            document.getElementById('search-form').submit();
        }
    });
</script>
