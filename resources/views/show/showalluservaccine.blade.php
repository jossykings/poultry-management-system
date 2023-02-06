@extends('layouts.app')
@section('section')
    <div class="mt-5">
        <a href="{{ url()->previous() }}" class="bg-green-300   text-white py-3 px-4 rounded">
            << back </a>
    </div>
    <div class="flex flex-col w-full justify-center p-4">
        <p class="text-center text-2xl my-2"> All Vaccines Given</p>
        <table class="w-full">
            <thead class=" boder-b">
                <tr>
                    <th>#</th>
                    <th>Name of Vaccine</th>
                    <th>Expiry Date</th>
                    <th>Quantity Used</th>
                    <th>Description</th>

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
                        <td>{{ $item->quantity_consumed }}</td>
                        <td>
                            {{ substr($item->description_of_vaccine, 0, 20) }}{{ strlen($item->description_of_vaccine) > 20 ? '....' : '' }}
                        </td>
                        <td>{{ $item->created_at->diffForHumans() }}</td>
                        <td>
                            <form action="/admin/vaccine/{{ $item->id }}" method="post">
                                @csrf
                                <button
                                    class="bg-red-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded">delete</button>
                            </form>
                        <td><a href="/vaccine/{{ $item->id }}" class="bg-blue-500 text-white py-3 px-4 rounded">view</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
