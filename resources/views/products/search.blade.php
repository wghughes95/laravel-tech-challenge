@extends('layouts.app')

@section('title', 'Product Search')

@section('content')
    <p class="mt-1 max-w-2xl text-xl text-gray-500">
        Search results for "{{ $search }}"
    </p>
    <div class="grid grid-cols-4">
        <div class="bg-white text-center m-6">
            <a href="/search?sortType=name-asc&search={{ $search }}">
                <p class="text-base font-semibold text-gray-900">Sort By Name ASC</p>
            </a>
        </div>
        <div class="bg-white text-center m-6">
            <a href="/search?sortType=name-desc&search={{ $search }}">
                <p class="text-base font-semibold text-gray-900">Sort By Name DESC</p>
            </a>
        </div>
        <div class="bg-white text-center m-6">
            <a href="/search?sortType=price-asc&search={{ $search }}">
                <p class="text-base font-semibold text-gray-900">Sort By Price ASC</p>
            </a>
        </div>
        <div class="bg-white text-center m-6">
            <a href="/search?sortType=price-desc&search={{ $search }}">
                <p class="text-base font-semibold text-gray-900">Sort By Price DESC</p>
            </a>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($products as $product)
            <div class="bg-white text-center m-6">
                <a href="/products/{{ $product->id }}">
                    <h3 class="text-sm text-gray-500">
                        {{ $product->name }}
                    </h3>
                    <p class="text-base font-semibold text-gray-900">£{{ $product->price }}</p>
                </a>
            </div>
        @endforeach
    </div>
    @if ($productCount > 5)
        {{ $products->appends(['search' => $search, 'sortType' => $sortType])->links() }}
    @endif
@endsection
