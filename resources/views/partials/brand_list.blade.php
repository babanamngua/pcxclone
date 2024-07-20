<ul>
    @foreach($brand1 as $brand)
        @if($category_id == $brand->category_id)
            <li>
                <a href="{{ route('collections.category', ['category' => $category_name, 'brand' => $brand->brand_name]) }}">
                    {{$brand->brand_name}}
                </a>
            </li>
        @endif
    @endforeach
</ul>