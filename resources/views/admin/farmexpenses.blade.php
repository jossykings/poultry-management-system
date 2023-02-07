@extends('layouts.app')
@section('section')
    <div class="mt-5">

        <a href="{{ url()->previous() }}" class="bg-green-300   text-white py-3 px-4 rounded">
            << back </a>
    </div>
    <div class="my-5">
        <div class="flex justify-between">
            <h2>Farm Financies</h2>
        </div>
        <hr>
        <p>Total Sales: {{ $totalsales }}</p>
        <p>Total Expenses:{{ $totalexpenses }}</p>

        @if ($totalexpenses > $totalsales)
            The farm is running on a loss, try improving your sales
            <p>Loss: {{ $totalsales - $totalexpenses }}</p>
        @else
            The farm is running on a profit, here is the farm total gain.
            <p>Gain: {{ $totalsales - $totalexpenses }}</p>
        @endif
    </div>
@endsection
