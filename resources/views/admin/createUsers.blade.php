@extends('layouts.app')
@section('styles')
    <style>
        #showform {
            transform: translateX(-2000px);
            height: 0;
        }

        #showform.open {
            transform: translateX(0);
            transition: transform 0.4s cubic-bezier(0.27, 0.46, 0.33, 1.35);
            height: 80%;
        }
    </style>
@endsection
@section('section')
    <div class="flex justify-end p-1">
        <button class="bg-blue-500 hover:bg-blue-400 text-white py-3 px-4 rounded " id="click">create user</button>

    </div>
    <div class="flex justify-center" id="showform">
        <div class="bg-white w-6/12 p-6 rounded-lg shadow-md">
            <h1 class="text-lg text-center w-full my-3">create user</h1>
            <form action="{{ route('adduser') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="name" class="sr-only">name:</label>
                <input type="text" name="name" id="name"
                    class="bg-gray-100  @error('name') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                    placeholder="user name" />
                @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <label for="email" class="sr-only">Email:</label>
                <input type="text" name="email" id="email"
                    class="bg-gray-100 @error('email') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                    placeholder="user email" />
                @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <label for="address" class="sr-only">Address:</label>
                <input type="text" name="address" id="address"
                    class="bg-gray-100 @error('address') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                    placeholder="User Address" />
                @error('address')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <label for="salary" class="sr-only">Salary:</label>
                <input type="number" name="salary" id="salary"
                    class="bg-gray-100 @error('salary') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                    placeholder="User Salary" />
                @error('salary')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <label for="position" class="sr-only">position:</label>
                <input type="text" name="position" id="position"
                    class="bg-gray-100 @error('position') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                    placeholder="User Position" />
                @error('position')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <label for="date" class="sr-only">date:</label>
                <input type="date" name="date" id="date"
                    class="bg-gray-100 @error('date') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                    placeholder="Date Employed" />
                @error('date')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password"
                    class="bg-gray-100 @error('password') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                    placeholder="set user password" id="password" />
                @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <label for="user_image">User Image</label>
                <input type="file" name="user_image"
                    class="bg-gray-100 @error('user_image') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                    id="user_image" />
                @error('user_image')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white py-3 px-4 rounded w-full">
                    create user
                </button>
            </form>
        </div>
    </div>
    @if (count($user) > 0)
        <div class="flex flex-col w-full justify-center p-4">
            <p class="text-center text-2xl my-2"> All users</p>
            <table class="w-full">
                <thead class=" boder-b">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Salary (&#8358;)</th>
                        <th>Rank</th>
                        <th>Date Employed</th>
                        <th>##
                        </th>
                        <th>###
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr class="border-b text-center">

                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->salary }}</td>
                            <td>{{ $item->position }}</td>
                            <td>{{ $item->date_employed }}</td>
                            <td>
                                <button
                                    class="bg-yellow-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded">edit</button>
                            </td>
                            <td>
                                <form action="/admin/users/{{ $item->id }}" method="post">
                                    @csrf
                                    <button
                                        class="bg-red-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded">delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="flex justify-center mt-10">
            <p>No User created</p>
        </div>
    @endif
@endsection
@section('script')
    <script src="{{ asset('js/index.js') }}"></script>
@endsection
