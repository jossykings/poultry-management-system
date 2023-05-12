@extends('layouts.app')
@section('section')
    <div class="mt-5">

        <a href="{{ url()->previous() }}" class="bg-green-300   text-white py-3 px-4 rounded">
            << back </a>
    </div>
    @if (count($feed) > 0)
        <div class="flex flex-col w-full justify-center p-4">
            <p class="text-center text-2xl my-2"> All Added Feeds</p>
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
                    @foreach ($feed as $item)
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
            <p>No Feed added</p>
        </div>
    @endif
@endsection
