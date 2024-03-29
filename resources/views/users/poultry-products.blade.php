@extends('layouts.app')
@section('section')
    <div>
        <div> <a href="{{ route('poultrydailydetail') }}" class=" bg-blue-500 my-4 text-white py-3 px-4 rounded">Click to
                View
                Details</a>
        </div>
        <div class="flex justify-center my-6">
            <div class="bg-white w-6/12 p-9 rounded-lg shadow-md  ">
                <h1 class="text-lg text-center w-full my-4">Daily Product Report</h1>
                <form action="{{ route('poultrydailystore') }}" method="POST">
                    @csrf
                    <label for="number_of_birds" class="sr-only">Number of birds</label>
                    <input type="number" name="number_of_birds" id="number_of_birds"
                        class="bg-gray-100 @error('number_of_birds') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Total Number of Birds" />
                    @error('number_of_birds')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="number_of_eggs" class="sr-only">Number of Eggs</label>
                    <input type="number" name="number_of_eggs" id="number_of_eggs"
                        class="bg-gray-100 @error('number_of_eggs') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Total Number of Eggs(Yield for Layers)" />
                    @error('number_of_eggs')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="yield_of_broilers" class="sr-only">Yield of Broilers</label>
                    <input type="number" name="yield_of_broilers" id="yield_of_broilers"
                        class="bg-gray-100 @error('yield_of_broilers') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Yield for Broilers(in Kg)" />
                    @error('yield_of_broilers')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="damaged_eggs" class="sr-only">Number of Damaged Eggs</label>
                    <input type="number" name="damaged_eggs" id="name"
                        class="bg-gray-100 @error('damaged_eggs') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Total Number of Damaged Eggs" />
                    @error('damaged_eggs')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="dead_birds" class="sr-only">Number of Birds that Die</label>
                    <input type="number" name="dead_birds" id="dead_birds"
                        class="bg-gray-100 @error('dead_birds') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Number of Birds that Die " />
                    @error('dead_birds')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="bg-green-300 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded w-full">
                        submit
                    </button>
                </form>
            </div>
        </div>
    @endsection
