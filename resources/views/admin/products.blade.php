@extends('layouts.app')
@section('section')
    <div>
        <div class="flex justify-center my-6 ">
            <div class="bg-white w-8/12 p-9 rounded-lg shadow-md ">
                <h1 class="text-lg text-center w-full my-4">Products</h1>
                <form action="{{ route('productstore') }}" method="POST">
                    @csrf
                    <label for="name" class="sr-only">Name of Product</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-100 @error('name') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Name of Product " />
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="price" class="sr-only">Price of product</label>
                    <input type="number" name="price"
                        class="bg-gray-100 @error('price') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="price of product" id="price" />
                    @error('price')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="quantity" class="sr-only">quantity</label>
                    <input type="number" name="quantity"
                        class="bg-gray-100 @error('quantity') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="quantity" id="quantity" />
                    @error('quantity')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="category">Category of Product</label>
                    <select
                        name="category"class="bg-gray-100 @error('category') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        id="category">
                        <option value="Egg">Egg</option>
                        <option value="Chicken">Chicken</option>
                    </select>
                    @error('category')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="quantity_of_eggs_used" class="sr-only">quantity of eggs used</label>
                    <input type="hidden" name="quantity_of_eggs_used"
                        class="bg-gray-100 @error('quantity_of_eggs_used') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Quantity of Eggs Used" id="quantity_of_eggs_used" />
                    <label for="number_of_birds" class="sr-only">number of birds</label>
                    <input type="hidden" name="number_of_birds"
                        class="bg-gray-100 @error('number_of_birds') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Number of Birds Used" id="number_of_birds" />
                    <label for="description" class="sr-only">description</label>
                    <textarea name="description" id="description"
                        class="bg-gray-100 @error('description') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        cols="30" rows="10" placeholder="description"></textarea>
                    @error('descrption')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="bg-green-300 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded w-full">
                        submit
                    </button>
                </form>
            </div>
        </div>
        @if (count($products) > 0)
            <div class="flex flex-col w-full justify-center p-4">
                <p class="text-center text-2xl my-2"> Recently Added Products</p>
                <table class="w-full">
                    <thead class=" boder-b">
                        <tr>
                            <th>#</th>
                            <th>Name of Product</th>
                            <th>Product Category</th>
                            <th>Date</th>
                            <th>Price (&#8358;)</th>
                            <th>Product Description</th>
                            <th>##
                            </th>
                            <th>###
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr class="border-b text-center">

                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name_of_product }}</td>
                                <td>{{ $item->product_category }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->price_of_product }}</td>
                                <td>
                                    {{ substr($item->product_descripiton, 0, 15) }}{{ strlen($item->product_descripiton) > 15 ? '....' : '' }}
                                </td>
                                <td>
                                    <button
                                        class="bg-yellow-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded">edit</button>
                                </td>
                                <td>
                                    <form action="" method="post">
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
                <p>No Products added</p>
            </div>
        @endif
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/purchase.js') }}"></script>
@endsection
