@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @foreach ($product as $prod)
            <input readonly class="form-control" name="product_id" value="{{ $prod->product_name }}">
            @foreach ($color as $cl)
                @if (!is_null($quantity->color_id) && $quantity->color_id !== '')
                    <input readonly class="form-control" value="{{ $cl->color_name }}">
                @endif
            @endforeach
            @if (!is_null($quantity->capacity) && $quantity->capacity !== '')
                <input readonly class="form-control" value="{{ $quantity->capacity }}">
            @endif
            @if (!is_null($quantity->size) && $quantity->size !== '')
                <input readonly class="form-control" value="{{ $quantity->size }}">
            @endif
            @if (!is_null($quantity->price) && $quantity->price !== '')
                <input readonly class="form-control"
                    value="{{ \App\Helpers\NumberHelper::formatCurrency($quantity->price) }}">
            @endif
        @endforeach
        <form action="{{ route('discountproduct.update', $quantity->quantity_id) }}" method="POST">
            @csrf
            @method('PUT')
            @if (count($discount) > 0)
                @foreach ($discount as $dis)
                    <div class="form-group">
                        <label for="quantity_product">mô tả</label>
                        <textarea name="description" style="resize: none;" rows="5" class="form-control">{{ $dis->description }}</textarea>
                        <label>Phần trăm (%) giảm giá</label>
                        <input type="number" name="value" class="form-control" value="{{ $dis->value }}"
                            max="100" required>
                        @php
                            // Giá gốc
                            $originalPrice = $quantity->price;

                            // Phần trăm giảm giá từ input
                            $discountPercent = $dis->value;

                            // Tính toán giá sau khi giảm
                            $discountedPrice = $originalPrice - ($originalPrice * $discountPercent) / 100;

                        @endphp
                        <div> Giá sau khi giảm {{ $dis->value }}%: {{ \App\Helpers\NumberHelper::formatCurrency($discountedPrice) }}</div>
                        {{-- <input type="number" id="valueInput" class="form-control" value="{{ $dis->value }}"
                            max="100" required>
                        <div id="discountedPrice">
                            Giá sau khi giảm <span id="discountPercent">{{ $dis->value }}</span>% còn
                            <p>{{ \App\Helpers\NumberHelper::formatCurrency($quantity->price - ($quantity->price * $dis->value / 100)) }}</p>
                        </div> --}}
                        <label>Ngày bắt đầu</label>
                        <input type="date" id="start_date" name="start_date" class="form-control"
                            value="{{ $dis->start_date ? \Carbon\Carbon::parse($dis->start_date)->format('Y-m-d') : '' }}">
                        <label>Ngày kết thúc</label>
                        <input type="date" id="end_date" name="end_date" class="form-control"
                            value="{{ $dis->end_date ? \Carbon\Carbon::parse($dis->end_date)->format('Y-m-d') : '' }}">
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
                <form method="POST" action="{{route('discountproduct.destroy',$dis->id)}}">
                    @csrf
                    @method('delete')
                <button type="submit" class="btn btn-danger" style="float: right;">xóa</button>
                </form>
            @else
                <div class="form-group">
                    <label for="quantity_product">mô tả</label>
                    <textarea name="description" style="resize: none;" rows="5" class="form-control"></textarea>
                    <label>Phần trăm (%) giảm giá</label>
                    <input type="number" name="value" class="form-control" max="100" required>
                    <label>Ngày bắt đầu</label>
                    <input type="date" id="start_date" name="start_date" class="form-control">
                    <label>Ngày kết thúc</label>
                    <input type="date" id="end_date" name="end_date" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
            @endif
    </div>
@endsection
@section('css')
<style>
    #discountedPrice {
        font-size: 18px;
        font-weight: bold;
        color: blue;
    }
    #discountedPrice p {
        color: red;
        font-size: 20px;
    }
</style>
@endsection

@section('js')
{{-- Thêm JavaScript để cập nhật giá sau khi giảm --}}
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const originalPrice = parseFloat(`{{ $quantity->price }}`);
        const valueInput = document.getElementById('valueInput');
        const discountedPriceDiv = document.getElementById('discountedPrice');
        const discountPercentSpan = document.getElementById('discountPercent');

        function updateDiscountedPrice() {
            const discountPercent = parseFloat(valueInput.value) || 0;
            const discountedPrice = originalPrice - (originalPrice * discountPercent / 100);

            const formatCurrency = (amount) => {
                return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);
            };

            discountedPriceDiv.querySelector('p').textContent = formatCurrency(discountedPrice);
            discountPercentSpan.textContent = discountPercent;
        }

        valueInput.addEventListener('input', updateDiscountedPrice);

        updateDiscountedPrice();
    });
</script> --}}
@endsection
