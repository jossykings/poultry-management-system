<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            flex-wrap: wrap;
        }

        .body {
            width: 100vw;
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(./images/forwelcome.jpg);
            background-size: cover;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-content: center;
        }

        .contents {
            background-color: black;
            opacity: 0.7;
            padding: 30px;

        }
    </style>
</head>

<body>

    <div class="body">
        <div class="contents text-white text-center">
            <h1 class="text-5xl mb-4">Welcome to FORA FARMS</h1>
            <p class="text-2xl mb-5">The home of poultry products which are rich in protein, <br> good source of
                phosphorus
                and
                B-complex vitamins. <br> click the link below to login
            </p>
            <p>

                <a href="{{ route('login') }}"
                    class="bg-blue-500 my-5 hover:bg-blue-400 text-white py-3 px-10 rounded">login</a>

            </p>
        </div>
    </div>

</body>

</html>
