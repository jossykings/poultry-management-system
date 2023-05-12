@extends('layouts.app')
@section('section')
    <div class="mt-5">
        <a href="{{ url()->previous() }}" class="bg-green-300   text-white py-3 px-4 rounded">
            << back </a>
    </div>
    <div class="my-5">
        <h1>Feed Details</h1>
        <hr>
        <div>Name of Feed: &nbsp;&nbsp; {{ $feed->name_of_feed }}</div>
        <div>Quantity Consumed:&nbsp;&nbsp;{{ $feed->quantity_consumed }}</div>
        <div>Category:&nbsp;&nbsp;{{ $feed->category_of_feed }}</div>
        <div>Size:&nbsp;&nbsp;{{ $feed->size_of_feed }}</div>
        <div>Date:&nbsp;&nbsp;{{ $feed->created_at }}</div>

    </div>
@endsection
