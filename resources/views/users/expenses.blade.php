@extends('layouts.app')
@section('section')
    <div>
        <div class="flex justify-center my-6 ">
            <div class="bg-white w-8/12 p-9 rounded-lg shadow-md ">
                <h1 class="text-lg text-center w-full my-4">Expenses</h1>
                <form action="{{ route('expensestore') }}" method="POST">
                    @csrf
                    <label for="serial_number" class="sr-only">Serial Number</label>
                    <input type="number" name="serial_number" id="serial_number"
                        class="bg-gray-100 @error('serial_number') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Serial Number" />
                    @error('serial_number')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="subject" class="sr-only">Subject</label>
                    <input type="text" name="subject"
                        class="bg-gray-100 @error('subject') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Subject" id="subject" />
                    @error('subject')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="reference" class="sr-only">reference</label>
                    <input type="text" name="reference"
                        class="bg-gray-100 @error('reference') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Reference" id="reference" />
                    @error('reference')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="possible_cost" class="sr-only">Possible Cost</label>
                    <input type="text" name="possible_cost"
                        class="bg-gray-100 @error('possible_cost') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Possible Cost(&#8358;)" id="possible_cost" />
                    @error('possible_cost')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="description" class="sr-only">description</label>
                    <textarea name="description" id="description"
                        class="bg-gray-100 @error('description') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        cols="30" rows="10" placeholder="Expenses Description"></textarea>
                    @error('description')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="bg-green-300 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded w-full">
                        submit
                    </button>
                </form>
            </div>

        </div>
        @if (count($expenses) > 3)
            <div class="flex justify-end ">
                <a href="{{ route('showallexpenses') }}"
                    class="bg-blue-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded">
                    show all expenses</a>
            </div>
        @endif
        @if (count($expenses) > 0)
            <div class="flex flex-col w-full justify-center p-4">
                <p class="text-center text-2xl my-2"> Recently Added Expenses</p>
                <table class="w-full">
                    <thead class=" boder-b">
                        <tr>
                            <th>#</th>
                            <th>Serial Number</th>
                            <th>Subject</th>
                            <th>Refernce</th>
                            <th>Description</th>
                            <th>##
                            </th>
                            <th>###
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenses as $item)
                            <tr class="border-b text-center">

                                <td>{{ $item->id }}</td>
                                <td>{{ $item->serial_number }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->reference }}</td>
                                <td>
                                    {{ substr($item->description, 0, 20) }}{{ strlen($item->description) > 20 ? '....' : '' }}
                                </td>
                                <td>
                                    <form action="{{ route('expensesdelete', $item->id) }}" method="post">
                                        @csrf
                                        <button
                                            class="bg-red-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded">delete</button>
                                    </form>
                                </td>
                                <td><a href="{{ route('showsingleexpenses', $item->id) }}"
                                        class="bg-blue-500 text-white py-3 px-4 rounded">view</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="flex justify-center mt-10">
                <p>No Expenses</p>
            </div>
        @endif
    </div>
@endsection
