<html>

<head>
    @vite(['resources/css/app.css'])
</head>

<body>
    <div class="flex flex-col min-h-screen">
        <header class="flex justify-between items-center bg-green-200 p-4 mb-6">
            <a href="{{ route('products') }}">
                <h1>やさい販売.com</h1>
            </a>

            <a href="{{ route('cart.index') }}">
                <button
                    class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-xl shadow">
                    🛒 カート
                </button>
            </a>
        </header>

        <div class="flex-grow">
            @yield('content')
        </div>

        <footer class="text-center text-gray-500 text-sm mt-6 mb-4">
            &copy; 2024 やさい販売.com
        </footer>
    </div>
</body>

</html>
