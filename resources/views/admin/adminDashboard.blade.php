@extends('layouts.app')
@section('styles')
    <style>
        .dash {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 20px;

        }

        .dash>div {
            height: 150px;
        }
    </style>
@endsection
@section('section')
    <div class="dash w-11/12 my-10">

        <div class="bg-green-200 flex justify-center p-5 text-white rounded-lg shadow-md flex-col">
            <h2>Total Number of users:&nbsp;&nbsp;{{ $totalusers }}</h2>
        </div>

        <div class="bg-blue-200  flex justify-center p-2 rounded-lg shadow-md flex-col">
            <h2>Total Number of feeds bought till date:{{ $totalfeeds }}</h2>
        </div>
        <div class="bg-yellow-200 flex justify-center p-2 rounded-lg shadow-md flex-col">
            <h2>Total Number of feeds used till date: {{ $totaluserfeeds }}</h2>


        </div>
        <div class="bg-cyan-200 flex justify-center p-2 rounded-lg shadow-md flex-col">
            <h2>Total Number of feeds remaining: {{ $totalfeedsremaining }}</h2>
        </div>
        <div class="bg-white flex justify-center p-2 rounded-lg shadow-md flex-col">
            <h2>Total Number of vaccines remaining: {{ $totalvaccineremaining }}</h2>


        </div>
        <div class="bg-green-200 flex justify-center p-2 rounded-lg shadow-md flex-col">
            <h2>Total Number of vaccines bought till date: {{ $totalvaccine }}</h2>

        </div>
        <div class="bg-blue-200 flex justify-center p-2 rounded-lg shadow-md flex-col">
            <h2>Total Number of vaccines used till date:

                {{ $totaluservaccine }}
            </h2>

        </div>
        <div class="bg-green-200 flex justify-center p-2 rounded-lg shadow-md flex-col">
            <h2>Product</h2>
            <p>Total Number of eggs: 10</p>
            <p>
                Total Number of birds:10
            </p>
        </div>
    </div>
@endsection
