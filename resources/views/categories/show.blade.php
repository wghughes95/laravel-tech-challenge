@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="bg-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-8 sm:py-8 lg:max-w-none lg:py-8">

                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
                    @foreach ($categories as $subcategory)
                        <div class="group relative align-middle">
                            <a href="/categories/{{ $subcategory->id }}">
                                <div
                                    class="text-center relative w-full overflow-hidden rounded-lg bg-white group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1 lg:aspect-h-1 text-4xl">

                                    {{ $subcategory->name }}

                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                @if (count($products) > 0)
                    <h2 class="text-2xl font-bold text-gray-900 text-center">Products</h2>

                    <div class="grid grid-cols-4">
                        <div class="bg-white text-center m-6">
                            <a href="/categories/{{ $category->id }}/name-asc">
                                <p class="text-base font-semibold text-gray-900">Sort By Name ASC</p>
                            </a>
                        </div>
                        <div class="bg-white text-center m-6">
                            <a href="/categories/{{ $category->id }}/name-desc">
                                <p class="text-base font-semibold text-gray-900">Sort By Name DESC</p>
                            </a>
                        </div>
                        <div class="bg-white text-center m-6">
                            <a href="/categories/{{ $category->id }}/price-asc">
                                <p class="text-base font-semibold text-gray-900">Sort By Price ASC</p>
                            </a>
                        </div>
                        <div class="bg-white text-center m-6">
                            <a href="/categories/{{ $category->id }}/price-desc">
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
                @endif

                @if ($productCount > 5)
                    {{ $products->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
