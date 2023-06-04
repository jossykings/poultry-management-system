@extends('layouts.app')
@section('section')
    <div class="mt-5">
        <a href="{{ url()->previous() }}" class="bg-green-300   text-white py-3 px-4 rounded">
            << back </a>
    </div>
    {{-- @if ($poultry > 0) --}}
    <div class="my-5">
        <h1>Poultry Birds Details</h1>
        <hr>
        @if ($poultry->count() > 0)
            <p>Total Number of Birds:{{ $poultry[0]->number_of_birds }}</p>
            <p>Total Number of Eggs:{{ $poultry[0]->number_of_eggs }}</p>
            <p>Total Number of Birds that Die:{{ $poultry[0]->number_of_birds_dead }}</p>
            <p>Total Number of Damaged Eggs:{{ $poultry[0]->number_of_damaged_eggs }}</p>
            <div>
                <h2 class="mt-5">Birds yield</h2>
                <hr>
                <p>Broliers(as in Weight in Kilograms):{{ $poultry[0]->yield_for_broilers }}Kg</p>
                <p>Layers(as in Number of Eggs):{{ $poultry[0]->number_of_eggs }}</p>
            </div>
            <div>
                <h2 class="mt-5">Initial Yield(as at when Bought)</h2>
                <hr>
                <p>Broliers(as in Weight in Kilograms):
                    @if ($chick->count() > 0)
                        {{ $chick[0]->yield }}kg
                    @else
                        no initial yield recorded
                    @endif
                </p>
            </div>
        @else
            <p>
                <center>No Report Added Yet</center>
            </p>
        @endif

    </div>
    {{-- @else
        <p>
            <center> Poultry daily Report not added </center>
        </p>
    @endif --}}
@endsection
