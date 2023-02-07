<nav class=" bg-green-200 fixed h-screen w-2/12   shadow-sm m-0">
    <div class="flex justify-center mt-2 ">
        <h1>FORA FARMS</h1>
    </div>
    <ul class="flex flex-col mx-4 my-5">
        @user
            @if (auth()->user()->image == 'noimage.jpg')
                <li class="flex mb-3 flex-col">
                    <p class="flex justify-center"><img src="{{ asset('images/profile.jpeg') }}" width="50px" height="50px"
                            alt="profile image" class="rounded-full">
                    </p>
                    <p class="flex justify-center">Name: {{ ucfirst(auth()->user()->name) }}</p>
                    <p class="flex justify-center">Position: {{ ucfirst(auth()->user()->position) }}</p>
                </li>
            @else
                <li class="flex mb-3 flex-col">
                    <p class="flex justify-center"><img src="{{ asset('storage/user_image/' . auth()->user()->image) }}"
                            width="50px" height='50px'alt="profile image" class="rounded-full">
                    </p>
                    <p class="flex justify-center">Name: {{ ucfirst(auth()->user()->name) }}</p>
                    <p class="flex justify-center">Position: {{ ucfirst(auth()->user()->position) }}</p>
                </li>
            @endif
            <li class="p-2 my-2">
                <a href="{{ route('userdashboard') }}">User Dashboard</a>
            </li>
            <li class='p-2 my-2 border-t-2 border-white'>
                <a href="{{ route('vaccine') }}">Vaccine</a>
            </li>
            <li class='p-2 my-2 border-t-2 border-white'>
                <a href="{{ route('feed') }}">Feeds</a>
            </li>
            <li class='p-2 my-2 border-t-2 border-white'>
                <a href="{{ route('expenses') }}">Expenses</a>
            </li>
            <li class='p-2 my-2 border-t-2 border-white'>
                <a href="{{ route('orders') }}">Orders</a>
            </li>
            <li class='p-2 my-2 border-t-2 border-white'>
                <a href="{{ route('sales') }}">Sales</a>
            </li>
            <li class='p-2 my-2 border-t-2 border-white'>
                <a href="{{ route('poultrydaily') }}">Poultry Daily Report</a>
            </li>
        @enduser
        @admin
            <li class="flex mb-5 flex-col">
                <p class="flex justify-center"><img src="{{ asset('images/profile.jpeg') }}" width="50px"
                        alt="profile image" class="rounded-full">
                </p>
                <p class="flex justify-center">Admin User</p>
            </li>
            <li>
                <a href="{{ route('admindashboard') }}">Dashboard</a>
            </li>
            <li class='p-1 my-4 border-t-2 border-white'>
                <a href="{{ route('totalfeeds') }}">Feeds</a>
            </li>
            <li class='p-1 my-4 border-t-2 border-white'>
                <a href="{{ route('chickpurchase') }}">Chicks Purchase</a>
            </li>
            <li class='p-1 my-4 border-t-2 border-white'>
                <a href="{{ route('totalvaccine') }}">vaccine</a>
            </li>
            <li class='p-1 my-4 border-t-2 border-white'>
                <a href="{{ route('products') }}">Products</a>
            </li>
            <li class='p-1 my-4 border-t-2 border-white'>
                <a href="{{ route('orders') }}">Orders</a>
            </li>
            <li class='p-1 my-4 border-t-2 border-white'>
                <a href="{{ route('totalexpenses') }}">All Expenses</a>
            </li>

            <li class="p-1 my-4 border-t-2 border-white">
                <a href="{{ route('showusers') }}"class='p-1'>add users</a>
            </li>
        @endadmin


    </ul>
</nav>
