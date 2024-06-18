@extends('layouts.clients')
@section('title')
   {{$title}}
@endsection
@section('content')
   <section>
        <h2>Search Results for: {{ $searchTerm }}</h2>
        @if($products->isEmpty())
            <p>No products found.</p>
        @else
            <div class="row" style="padding: 64px;">
                @foreach($products as $product)
                    <div style="width: 300px; margin:0;">
                            <img src="{{ asset('storage/products/' . $product->product_name . '/' . $product->url_name) }}" class="card-img-top" alt="{{ $product->product_name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->product_name }}</h5>
                                <p class="card-text">{{ \App\Helpers\NumberHelper::formatCurrency($product->price) }}</p>
                                <a href="{{ route('products.detail', $product->product_id) }}" class="btn btn-primary">View Details</a>
                            </div>
                    </div>
                @endforeach
            </div>
        @endif
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection
