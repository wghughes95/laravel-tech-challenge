@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="bg-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-8 sm:py-8 lg:max-w-none lg:py-8">

                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
                    @foreach ($categories as $category)
                        <div class="group relative align-middle">
                            <a href="/categories/{{ $category->id }}">
                                <div
                                    class="text-center relative w-full overflow-hidden rounded-lg bg-white group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1 lg:aspect-h-1 text-4xl">

                                    {{ $category->name }}

                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
