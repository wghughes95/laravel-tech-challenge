<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tech Test</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        ul .page-item {
            display: inline;
        }
    </style>

</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="hidden md:block">
                            <div class="flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="/"
                                    class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                                    aria-current="page">Home</a>
                                <a href="/categories"
                                    class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                                    aria-current="page">Categories</a>

                                <form action="/search">
                                    <div class="flex items-baseline">
                                        <input type="text" name="search" id="search"
                                            class="shadow appearance-none border rounded w-full p-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            placeholder="Search products">
                                        <input type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 rounded focus:outline-none focus:shadow-outline">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">@yield('title')</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
