@extends('layouts.app')
@section('section')
    @if (count($order) > 0)
        <div class="flex flex-col w-full justify-center p-4">
            <p class="text-center text-2xl my-5"> All Orders</p>
            <table class="w-full">
                <thead class=" boder-b">
                    <tr>
                        <th>Order Id</th>
                        <th>Name of Product</th>
                        <th>Customer Name</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>##</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                        <tr class="border-b text-center">

                            <td>{{ ucfirst($item->order_id) }}</td>
                            <td class="p-3">{{ ucfirst($item->product_name) }}</td>
                            <td>{{ ucfirst($item->customer_name) }}</td>

                            <td>{{ ucfirst($item->payment_method) }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td class="p-4"><a href="poultry/index.php/orders/{{ $item->order_id }}"
                                    class="bg-yellow-400 hover:bg-blue-400  text-white py-3 px-4 rounded">view</a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="flex justify-center mt-10">
            <p>No Orders Yet</p>
        </div>
    @endif
@endsection
