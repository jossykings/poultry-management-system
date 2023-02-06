@extends('layouts.app')
@section('section')
    <div>
        @if (count($adminvaccine) > 0)
            <center>Vaccines Avaliable </center>
            <div class="flex justify-center my-6 ">
                <table class="w-11/12">

                    <thead class=" boder-b">
                        <tr>
                            <th>#</th>
                            <th>Name of vaccine</th>
                            <th>Quantity Avaliable</th>
                            <th>Expiry Date</th>
                            <th>Description</th>
                            <th>Quantity Given</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adminvaccine as $item)
                            <tr class="border-b text-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name_of_vaccine }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->expiry_date }}</td>
                                <form action="{{ route('vaccinestore') }}" method="post">
                                    <td>
                                        <textarea name="description" id="description" cols=20" rows="4" placeholder="Usage Description"
                                            class="bg-gray-100 @error('description') border-red-300 @enderror border-2 w-full p-2 rounded-lg "></textarea>
                                    </td>
                                    @csrf
                                    <td>
                                        <input type="hidden" name="name" value="{{ $item->name_of_vaccine }}">

                                        <input type="hidden" name="expiry_date" value="{{ $item->expiry_date }}">
                                        <label for="quantity"></label>
                                        <input type="number" style="width: 60px" value="1" name="quantity"
                                            class="bg-gray-100 @error('quantity') border-red-300 @enderror border-2  p-2 rounded-lg mb-3">
                                    </td>
                                    <td>
                                        <button class="bg-blue-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded"> add
                                            vaccine</button>

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
        @if (count($vaccine) > 3)
            <div class="flex justify-end ">
                <a href="{{ route('showvaccine') }}"
                    class="bg-blue-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded">
                    view all
                    vaccines</a>
        @endif
        @if (count($vaccine) > 0)
    </div>
    <div class="flex flex-col w-full justify-center p-4">
        <p class="text-center text-2xl my-2"> Recently Added Vaccine</p>
        <table class="w-full">
            <thead class=" boder-b">
                <tr>
                    <th>#</th>
                    <th>Name of Vaccine</th>
                    <th>Expiry Date</th>
                    <th>Quantity Used</th>
                    <th>Description</th>
                    <th>Date</th>

                    <th>###
                    </th>
                    <th>####
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
                        <td>{{ $item->created_at }}</td>

                        <td>
                            <form action="poultry/index.php/vaccine/{{ $item->id }}" method="post">
                                @csrf
                                <button
                                    class="bg-red-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded">delete</button>
                            </form>
                        </td>
                        <td><a href="poultry/index.php/vaccine/{{ $item->id }}"
                                class="bg-blue-500 text-white py-3 px-4 rounded">view</a></td>
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
