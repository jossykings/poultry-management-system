@extends('layouts.app')
@section('section')
    <div class="mt-5">

        <a href="{{ url()->previous() }}" class="bg-green-300   text-white py-3 px-4 rounded">
            << back </a>
    </div>
    <div class="my-5">
        <div class="flex justify-between">
            <h2>Order Details</h2>
            <p class="bg-blue-200 mx-3 mb-3  text-white py-3 px-4 rounded">
                {{ $orders['0']->status }}
            </p>
        </div>
        <hr>
        @if (count($orders) == 1)
            @foreach ($orders as $item)
                <div class="">
                    <div class="flex mb-2 ">
                        <h2> Order # </h2>
                        <p class="mx-3">{{ $item->order_id }}</p>
                    </div>
                    <div class="flex mb-2">
                        <h2> Order Date </h2>
                        <p class="mx-3">{{ $item->created_at }}</p>
                    </div>
                    <div class="flex mb-2">
                        <h2> Order Status </h2>
                        @if ($orders['0']->status == 'delivered')
                            <p class="bg-blue-200 mx-3 mb-3  text-white py-3 px-4 rounded">
                                {{ $orders['0']->status }}
                            </p>
                        @else
                            <form action="/orders/{{ $item->order_id }}" method="POST">
                                @csrf
                                <select
                                    name="status"class="bg-gray-100 mx-3 @error('status') border-red-300 @enderror border-2  p-2 rounded-lg mb-3"
                                    id="status">
                                    <option value="ready for pickup">Ready for Pickup</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="pending">Pending</option>
                                </select>
                                <button type='submit'class="bg-green-300 text-white py-3 px-4 rounded">change</button>
                            </form>
                        @endif
                    </div>
                    <div class="flex">
                        <h2>Unit Price</h2>
                        <p class="mx-3">{{ $item->unit_price }}</p>
                    </div>
                    <h2 class="text-lg mt-3"><strong> Customer Details</strong> </h2>
                    <hr>
                    <p>Customer:&nbsp;&nbsp;{{ $item->customer_name }}</p>
                    <p>Customer Mobile No:&nbsp;&nbsp;{{ $item->customer_number }}</p>
                    <p>Customer Email:&nbsp;&nbsp;{{ $item->customer_email }}</p>
                    <p>Customer Address:&nbsp;&nbsp;{{ $item->customer_address }}</p>
                    <h2 class="mt-5  text-lg"><strong>Product Details </strong> </h2>
                    <hr>
                    <p>Prduct:&nbsp;&nbsp;{{ $item->product_name }}</p>
                    <p>Product Category:&nbsp;&nbsp;{{ $item->product_category }}</p>
                    <p>Unit Price:&nbsp;&nbsp;{{ $item->unit_price }}
                    </p>
                    <p>
                        Quantity:&nbsp;&nbsp;{{ $item->quantity }}
                    </p>
                </div>
            @endforeach
        @else
            <div class="flex justify-center flex-col mt-10 ">
                <div>
                    <h2 class="text-lg"><strong> Customer Details</strong> </h2>
                    <hr>
                    <p>Date: &nbsp;&nbsp;{{ $orders['0']->created_at }}</p>
                    <p>Product Id:&nbsp;&nbsp;{{ $orders['0']->order_id }}</p>
                    <p>Customer:&nbsp;&nbsp;{{ $orders['0']->customer_name }}</p>
                    <p>Customer Mobile No:&nbsp;&nbsp;{{ $orders['0']->customer_number }}</p>
                    <p>Customer Email:&nbsp;&nbsp;{{ $orders['0']->customer_email }}</p>
                    <p>Customer Address:&nbsp;&nbsp;{{ $orders['0']->customer_address }}</p>
                    <p>Payment Mode:&nbsp;&nbsp;{{ $orders['0']->payment_method }}</p>
                    <div class="flex mb-2">
                        <h2> Order Status </h2>
                        @if ($orders['0']->status == 'delivered')
                            <p class="bg-blue-200 mx-3 mb-3  text-white py-3 px-4 rounded">
                                {{ $orders['0']->status }}
                            </p>
                        @else
                            <form action="/orders/{{ $orders['0']->order_id }}" method="POST">
                                @csrf
                                <select
                                    name="status"class="bg-gray-100 mx-3 @error('status') border-red-300 @enderror border-2  p-2 rounded-lg mb-3"
                                    id="status">
                                    <option value="ready for pickup">Ready for Pickup</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="pending">Pending</option>
                                </select>
                                <button tyep='submit'class="bg-green-300 text-white py-3 px-4 rounded">change</button>
                            </form>
                        @endif
                    </div>
                </div>
                <h2 class="mt-5  text-lg"><strong>Product Details </strong> </h2>
                <hr>
                <table class="w-8/12 mt-5 border-seperate">
                    <thead>
                        <tr>
                            <th class="border">Product Name</th>
                            <th class="border">Product Category</th>
                            <th class="border">Unit Price(&#8358;)
                            </th>
                            <th class="border">Quantity
                            </th>
                        </tr>
                    </thead>
                    <tbody class="border-seperate">
                        @foreach ($orders as $item)
                            <tr class="text-center">
                                <td class="border p-3">{{ $item->product_name }}</td>
                                <td class="border">{{ $item->product_category }}</td>
                                <td class="border">{{ $item->unit_price }}
                                </td>
                                <td class="border">
                                    {{ $item->quantity }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
