@extends('layouts.app')
@section('section')
    <div class="mt-5">
        @if (count($product) > 0)
            <center>Products Avaliable for sale</center>
            <div class="flex justify-center my-6 ">
                <table class="w-8/12">

                    <thead class=" boder-b">
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Product Category</th>
                            <th>Pricing(&#8358;)
                            </th>
                            <th>Quantity
                            </th>
                            <th>Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr class="border-b text-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name_of_product }}</td>
                                <td>{{ $item->product_category }}</td>
                                <td>{{ $item->price_of_product }}</td>
                                <form action="{{ route('cartstore') }}" method="post">
                                    @csrf
                                    <td>
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <label for="quantity"></label>
                                        <input type="number" value="1" name="quantity"
                                            class="bg-gray-100 @error('quantity') border-red-300 @enderror border-2  p-2 rounded-lg mb-3">
                                    </td>
                                    <td>
                                        <button class="bg-blue-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded"> add
                                            to
                                            cart</button>

                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <center>No Product avaliable for sale</center>
        @endif
        @if (!empty($cart))
            <h3 class=" mt-20 ">Shopping Cart</h3>
            <hr>
            <div class="flex justify-center mt-20 ">
                <table class="w-8/12 border-seperate">

                    <thead>
                        <tr>
                            <th class="border">Product Name</th>
                            <th class="border">Product Category</th>
                            <th class="border">Unit Price(&#8358;)
                            </th>
                            <th class="border">Quantity
                            </th>
                            <th class="border">Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="border-seperate">
                        @foreach ($cart as $item)
                            <tr class="text-center">

                                <td class="border">{{ $item['product']['name_of_product'] }}</td>
                                <td class="border">{{ $item['product']['product_category'] }}</td>
                                <td class="border">{{ $item['product']['price_of_product'] * $item['quantity'] }}

                                </td>
                                <td class="border">
                                    {{ $item['quantity'] }}
                                </td>
                                <td class="border">
                                    <form action="{{ route('deletecart', $item['id']) }}" method="POST">
                                        @csrf
                                        <button class="bg-red-300 hover:bg-red-100 my-4 text-white py-3 px-4 rounded">
                                            remove</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-full flex justify-center mt-10">
                <form action="{{ route('saveorder') }}" method="post" class="w-6/12">
                    @csrf
                    <label for="name" class="sr-only">Customer Name:</label>
                    <input type="text" name="customer_name" id="name"
                        class="bg-gray-100 @error('customer_name') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Customer Name" />
                    @error('customer_name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="name" class="sr-only">Customer Number:</label>
                    <input type="text" name="customer_number" id="customer_number"
                        class="bg-gray-100 @error('customer_number') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Customer Number" />
                    @error('customer_number')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="address" class="sr-only">Customer address:</label>
                    <input type="text" name="customer_address" id="customer_address"
                        class="bg-gray-100 @error('customer_address') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Customer Address" />
                    @error('customer_address')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="customer_email" class="sr-only">Customer Email:</label>
                    <input type="text" name="customer_email" id="customer_email"
                        class="bg-gray-100 @error('customer_email') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Customer Email" />
                    @error('customer_email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <div class="flex justify-between">
                        <div>
                            <p>Payment Method</p>
                            <input type="radio" name="payment_method" id="cash" value="cash">
                            <label for="cash">Cash</label><br>
                            <input type="radio" name="payment_method" id="card" value="card">
                            <label for="card">Card</label>
                        </div>
                        <div>
                            <p>Status</p>
                            <input type="radio" name="status" id="pending" value="pending">
                            <label for="pending">Pending</label><br>
                            <input type="radio" name="status" id="delivered" value="delivered">
                            <label for="delivered">Delivered</label>
                            <p>
                                <input type="radio" name="status" id="pickup" value="ready for pickup">
                                <label for="pickup">Ready for Pickup</label>
                            </p>
                        </div>
                    </div>

                    <button
                        class="bg-green-300 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded w-full">Checkout</button>
                </form>
            </div>
        @else
            <center>Nothing Added To Cart</center>
        @endif
    </div>
@endsection
