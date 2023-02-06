<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .display-grid {
            display: grid;
            grid-template-columns: 20% 80%;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="display-grid">


        <div>

            @include('partials.navbar')
        </div>
        <div>
            @auth

                <div class=" p-2   flex justify-end">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="bg-blue-500  hover:bg-blue-400 text-white py-3 px-4 rounded">logout</button>
                    </form>
                </div>
            @endauth
            <div class="flex justify-center">
                @include('partials.errors')
            </div>
            @yield('section')
        </div>
    </div>
    @yield('script')
</body>

</html>
