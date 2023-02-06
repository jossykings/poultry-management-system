@extends('layouts.app')
@section('section')
    <div class="mt-5">

        <a href="{{ url()->previous() }}" class="bg-green-300   text-white py-3 px-4 rounded">
            << back </a>
    </div>
    <div class="flex flex-col w-full justify-center p-4">
        <p class="text-center text-2xl my-2"> Recently Added Feeds</p>
        <table class="w-full">
            <thead class=" boder-b">
                <tr>
                    <th>#</th>
                    <th>Name of feed</th>
                    <th>Quantity Consumed</th>
                    <th>Category of Feed</th>
                    <th>Size of Feed</th>

                    <th>###
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feed as $item)
                    <tr class="border-b text-center">

                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name_of_feed }}</td>
                        <td>{{ $item->quantity_consumed }}</td>
                        <td>{{ $item->category_of_feed }}</td>
                        <td>{{ $item->size_of_feed }}</td>

                        <td>
                            <form action="poultry/index.php/admin/feed/{{ $item->id }}" method="post">
                                @csrf
                                <button
                                    class="bg-red-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded">delete</button>
                            </form>
                        </td>
                        <td><a href="poultry/index.php/feed/{{ $item->id }}"
                                class="bg-blue-500 text-white py-3 px-4 rounded">view</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
