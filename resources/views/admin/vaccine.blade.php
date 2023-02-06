@extends('layouts.app')
@section('section')
    <div>
        <div class="flex justify-center my-6 ">
            <div class="bg-white w-8/12 p-9 rounded-lg shadow-md">
                <h1 class="text-lg text-center w-full my-4">Vaccine</h1>
                <form action="{{ route('totalpostvaccine') }}" method="POST">
                    @csrf
                    <label for="name" class="sr-only">Name of vaccine</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-100 @error('name') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Name of vaccine" />
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="name" class="">Expiry date:</label>
                    <input type="date" name="expiry_date" id="expiry_date"
                        class="bg-gray-100 @error('expiry_date') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="expiry date" />
                    @error('expiry_date')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="quantity" class="sr-only">quantity:</label>
                    <input type="number" name="quantity" id="quantity"
                        class="bg-gray-100 @error('quantity') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="quantity bought" />
                    @error('quantity')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="price" class="sr-only">Price:</label>
                    <input type="number" name="price" id="price"
                        class="bg-gray-100 @error('price') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Total Price" />
                    @error('price')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="description" class="sr-only">description</label>
                    <textarea name="description" id="description"
                        class="bg-gray-100 @error('description') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        cols="30" rows="10" placeholder="Vaccine description"></textarea>

                    <button type="submit" class="bg-green-300 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded w-full">
                        submit
                    </button>
                </form>
            </div>
        </div>
        @if (count($vaccine) > 0)
            <div class="flex flex-col w-full justify-center p-4">
                <p class="text-center text-2xl my-2"> Recently Added Vaccine</p>
                <table class="w-full">
                    <thead class=" boder-b">
                        <tr>
                            <th>#</th>
                            <th>Name of Vaccine</th>
                            <th>Expiry Date</th>
                            <th>Total Quantity</th>
                            <th>Price (&#8358;)</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>##
                            </th>
                            <th>###
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vaccine as $item)
                            <tr class="border-b text-center">

                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name_of_vaccine }}</td>
                                <td>{{ $item->expiry_date }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    {{ substr($item->description_of_vaccine, 0, 20) }}{{ strlen($item->description_of_vaccine) > 20 ? '....' : '' }}
                                </td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>
                                    <button
                                        class="bg-yellow-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded">edit</button>
                                </td>
                                <td>
                                    <form action="poultry/index.php/admin/vaccine/{{ $item->id }}" method="post">
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
                <p>No vaccine added</p>
            </div>
        @endif
    </div>
@endsection
