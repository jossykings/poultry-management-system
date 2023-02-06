@extends('layouts.app')
@section('section')
    <div>
        @if (count($adminfeed) > 0)
            <center>Feeds Avaliable for Consumption</center>
            <div class="flex justify-center my-6 ">
                <table class="w-11/12">

                    <thead class=" boder-b">
                        <tr>
                            <th>#</th>
                            <th> Name of Feed</th>
                            <th>Category of Feed</th>
                            <th>Quantity Avaliable</th>
                            <th>Size Avaliable</th>
                            <th>Quantity Given</th>
                            <th>Size</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adminfeed as $item)
                            <tr class="border-b text-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name_of_feed }}</td>
                                <td>{{ $item->category_of_feed }}</td>
                                <td>{{ $item->quantity_of_feed }}</td>
                                <td>{{ $item->size_of_feed }}</td>
                                <form action="{{ route('feedstore') }}" method="post">
                                    @csrf
                                    <td>
                                        <input type="hidden" name="name" value="{{ $item->name_of_feed }}">
                                        <input type="hidden" name="category" value="{{ $item->category_of_feed }}">
                                        <label for="quantity"></label>
                                        <input type="number" style="width: 60px" value="1" name="quantity_consumed"
                                            class="bg-gray-100 @error('quantity_consumed') border-red-300 @enderror border-2  p-2 rounded-lg mb-3">
                                    </td>
                                    <td class="">
                                        <label for="size"></label>
                                        <input style="width: 60px" type="number" value="1"
                                            class="bg-gray-100 @error('size') border-red-300 @enderror border-2 mb-3  p-2 rounded-lg"
                                            name="size" id="size">
                                    </td>
                                    <td>
                                        <button class="bg-blue-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded"> add
                                            feed</button>

                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <center>No Feed Avaliable</center>
        @endif
        @if (count($feed) > 3)
            <div class="flex justify-end ">
                <a href="{{ route('showallfeeds') }}"
                    class="bg-blue-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded">
                    view all
                    feed</a>
            </div>
        @endif
        @if (count($feed) > 0)
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
                                <td><a href="{{ route('showsinglefeed', $item->id) }}"
                                        class="bg-blue-500 text-white py-3 px-4 rounded">view</a>
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
