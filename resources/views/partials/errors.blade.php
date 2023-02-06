@if (count($errors) == 0)
    @foreach ($errors->all() as $err)
        <div class="bg-red-500 rounded w-4/12 my-2 text-white  p-2">
            <p>

                {{ $err }}
            </p>
        </div>
    @endforeach
@endif
@if (session('success'))
    <div class="bg-green-200 rounded w-4/12 my-2 text-white   p-2">
        <p>

            {{ session('success') }}
        </p>
    </div>
@endif
@if (session('error'))
    <div class="bg-red-500 rounded w-4/12 my-2 text-white  p-2">
        <p>

            {{ session('error') }}
        </p>
    </div>
@endif
