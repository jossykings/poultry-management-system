@extends('layouts.app')
@section('section')
    <div>
        <div class="flex justify-center my-6 ">
            <div class="bg-white w-6/12 p-9 rounded-lg shadow-md ">
                <h1 class="text-lg text-center w-full my-4">Disease</h1>
                <form action="{{ route('expensestore') }}" method="POST">
                    @csrf
                    <label for="name" class="sr-only">Name of Disease</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-100 @error('name') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Name of Disease" />
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="description" class="sr-only">description</label>
                    <textarea name="description" id="description"
                        class="bg-gray-100 @error('description') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        cols="30" rows="10" placeholder="Description"></textarea>
                    @error('description')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="bg-green-300 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded w-full">
                        submit
                    </button>
                </form>
            </div>
        </div>
    @endsection
