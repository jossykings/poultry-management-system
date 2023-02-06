@extends('layouts.app')
@section('section')
    <div class="mt-5">
        <a href="{{ url()->previous() }}" class="bg-green-300   text-white py-3 px-4 rounded">
            << back </a>
    </div>
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
                        <td>{{ $item->description }}</td>
                        <td>
                            <form action="/expenses/{{ $item->id }}" method="post">
                                @csrf
                                <button
                                    class="bg-red-500 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded">delete</button>
                            </form>
                        </td>
                        <td><a href="/expenses/{{ $item->id }}"
                                class="bg-blue-500 text-white py-3 px-4 rounded">view</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
