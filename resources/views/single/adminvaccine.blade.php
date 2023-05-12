@extends('layouts.app')
@section('section')
    <div class="mt-5">

        <a href="{{ url()->previous() }}" class="bg-green-300   text-white py-3 px-4 rounded">
            << back </a>
    </div>
    @if (count($vaccine) > 0)
        <div class="flex flex-col w-full justify-center p-4">
            <p class="text-center text-2xl my-2"> All Added Vaccine</p>
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
            <p>No vaccine added</p>
        </div>
    @endif
@endsection
