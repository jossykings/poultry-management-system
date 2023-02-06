@extends('layouts.app')
@section('section')
    <div>
        <div class="flex justify-center my-6 ">
            <div class="bg-white w-8/12 p-9 rounded-lg shadow-md ">
                <h1 class="text-lg text-center w-full my-4">Feeds</h1>
                <form action="{{ route('totalpostfeeds') }}" method="POST">
                    @csrf
                    <label for="name" class="sr-only">Name of feed</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-100 @error('name') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Name of feed" />
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="total_quantity" class="sr-only">Total quantity</label>
                    <input type="number" name="total_quantity"
                        class="bg-gray-100 @error('total_quantity') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Total quantity" id="total_quantity" />
                    @error('total_quantity')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="cost" class="sr-only">Cost of Feed</label>
                    <input type="number" name="cost"
                        class="bg-gray-100 @error('cost') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Cost of Feed(&#8358;)" id="total_quantity" />
                    @error('cost')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="category">Category of feed</label>
                    <select
                        name="category"class="bg-gray-100 @error('category') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        id="category">
                        <option value="starter">Starter</option>
                        <option value="grower">Grower</option>
                        <option value="finisher">Finisher</option>
                        <option value="Layers">Layers</option>
                    </select>
                    @error('category')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror

                    <label for="size" class="sr-only">size</label>
                    <input type="number" name="size"
                        class="bg-gray-100 @error('size') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="size" id="size" />
                    @error('size')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="bg-green-300 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded w-full">
                        submit
                    </button>
                </form>
            </div>
        </div>
        @if (count($feeds) > 0)
            <div class="flex flex-col w-full justify-center p-4">
                <p class="text-center text-2xl my-2"> Recently Added Feeds</p>
                <table class="w-full">
                    <thead class=" boder-b">
                        <tr>
                            <th>#</th>
                            <th>Name of feed</th>
                            <th>Total Quantity</th>
                            <th>Cost of Feed (&#8358;)</th>
                            <th>Category of Feed</th>
                            <th>Size of Feed</th>
                            <th>##
                            </th>
                            <th>###
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feeds as $item)
                            <tr class="border-b text-center">

                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name_of_feed }}</td>
                                <td>{{ $item->quantity_of_feed }}</td>
                                <td>{{ $item->price_of_feed }}</td>
                                <td>{{ $item->category_of_feed }}</td>
                                <td>{{ $item->size_of_feed }}</td>
                                <td>
                                    <button
                                        class="bg-yellow-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded">edit</button>
                                </td>
                                <td>
                                    <form action="/admin/feed/{{ $item->id }}" method="post">
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
                <p>No Feed added</p>
            </div>
        @endif
    </div>
@endsection
