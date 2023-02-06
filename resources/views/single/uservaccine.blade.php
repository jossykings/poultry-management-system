@extends('layouts.app')
@section('section')
    <div class="mt-5">
        <a href="{{ url()->previous() }}" class="bg-green-300   text-white py-3 px-4 rounded">
            << back </a>
    </div>
    <div class="my-5">
        <h1>Vaccine Details</h1>
        <hr>
        <div>Name of Vaccine: &nbsp;&nbsp; {{ $vaccine->name_of_vaccine }}</div>
        <div>Expiry Date: &nbsp;&nbsp; {{ $vaccine->expiry_date }}</div>
        <div>Quantity Consumed:&nbsp;&nbsp;{{ $vaccine->quantity_consumed }}</div>
        <div>Description:&nbsp;&nbsp;{{ $vaccine->description_of_vaccine }}</div>
        <div>Date Vaccine Was Given:&nbsp;&nbsp;{{ $vaccine->created_at }}</div>

    </div>
@endsection
