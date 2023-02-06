@extends('layouts.app')
@section('section')
    <div class="mt-5">
        <a href="{{ url()->previous() }}" class="bg-green-300   text-white py-3 px-4 rounded">
            << back </a>
    </div>
    <div class="my-5">
        <h1>Expenses Details</h1>
        <hr>
        <div>Serial Number: &nbsp;&nbsp; {{ $expenses->serial_number }}</div>
        <div>Subject:&nbsp;&nbsp;{{ $expenses->subject }}</div>
        <div>Reference:&nbsp;&nbsp;{{ $expenses->reference }}</div>
        <div>Description:&nbsp;&nbsp;{{ $expenses->description }}</div>

    </div>
@endsection
