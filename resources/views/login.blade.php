<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="flex justify-center my-3">
        @include('partials.errors')
    </div>
    <div class="flex justify-center my-6 ">
        <div class="bg-white w-4/12 p-9 rounded-lg shadow-md ">
            <div class="flex justify-center ">
                <img src="{{ asset('images/forlogin.jpg') }}" width="200px" alt="school logo">
            </div>
            <h1 class="text-lg text-center w-full my-4">login</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="email" class="sr-only">Email:</label>
                <input type="text" name="email" id="name"
                    class="bg-gray-100 @error('email') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                    placeholder="your email" />
                @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password"
                    class="bg-gray-100 @error('password') border-red-300 @enderror border-2 w-full p-4 rounded-lg"
                    placeholder="your password" id="password" />
                @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <button type="submit" class="bg-green-300 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded w-full">
                    submit
                </button>
            </form>
        </div>
</body>

</html>
