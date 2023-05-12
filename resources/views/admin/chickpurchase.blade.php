@extends('layouts.app')
@section('section')
    <div>
        <div class="flex justify-center my-6 ">
            <div class="bg-white w-8/12 p-9 rounded-lg shadow-md ">
                <h1 class="text-lg text-center w-full my-4">Chick Purchase</h1>
                <form action="{{ route('chickstore') }}" method="POST">
                    @csrf
                    <label for="category">Chick Type</label>
                    <select
                        name="chick_type"class="bg-gray-100 @error('chick_type') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        id="chick_type">
                        <option value="layers">Layers</option>
                        <option value="broilers">Broliers</option>
                    </select>
                    @error('chick_type')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="name" class="sr-only">Company Name</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-100 @error('name') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Company Name" />
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="yield" class="" style="display: none;" id="yield_label">Yield(weight of chick in
                        kg)</label>
                    <input type="hidden" name="yield" id="yield"
                        class="bg-gray-100 @error('yield') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="" value="0" />
                    @error('yield')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="quantity_bought" class="sr-only">Quantity Bought</label>
                    <input type="number" name="quantity_bought"
                        class="bg-gray-100 @error('quantity_bought') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Quanity Bought" id="quantity_bought" />
                    @error('quantity_bought')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <label for="unit_price" class="sr-only">Unit Price</label>
                    <input type="number" name="unit_price"
                        class="bg-gray-100 @error('unit_price') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Unit Price(&#8358;)" id="unit_price" />
                    @error('unit_price')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror


                    <label for="total_price" class="sr-only">total price</label>
                    <input type="number" name="total_price"
                        class="bg-gray-100 @error('total_price') border-red-300 @enderror border-2 w-full p-4 rounded-lg mb-3"
                        placeholder="Total Price(&#8358;)" id="total_price" />
                    @error('tota;_price')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="bg-green-300 hover:bg-blue-400 my-4 text-white py-3 px-4 rounded w-full">
                        submit
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/anoda.js') }}"></script>
@endsection
