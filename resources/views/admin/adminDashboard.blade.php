@extends('layouts.app')
@section('styles')
    <style>
        .dash {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 20px;

        }

        .dash div {
            height: 150px;
        }

        .users {
            display: flex;
            /* flex-direction: row; */
            justify-content: space-between;
            align-items: center;
        }

        .users img {
            width: 50px;
        }

        .userss {
            display: flex;
            /* flex-direction: row; */
            justify-content: space-between;

        }

        .userss img {
            width: 50px;
        }
    </style>
@endsection
@section('section')
    <div class="dash w-11/12 my-10">

        <a href="{{ route('showusers') }}">

            <div class="users bg-green-200 flex justify-center p-5  rounded-lg shadow-md flex-col">
                <div class="image"><img src="{{ asset('images/group.png') }}" alt="group"></div>
                <div>

                    <h2>Total Number of users:&nbsp;&nbsp;{{ $totalusers }}</h2>
                </div>
            </div>
        </a>
        <a href="{{ route('viewfeed') }}">

            <div class="users bg-blue-200  flex justify-center p-2 rounded-lg shadow-md flex-col">
                <div class="image" style="padding-right: 10px;"><img src="{{ asset('images/chicken.png') }}" alt="group">
                </div>
                <div>

                    <h2>Total NO. of feeds bought till date:{{ $totalfeeds }}</h2>
                    <h2>Total NO. of feeds used till date: {{ $totaluserfeeds }}</h2>
                    <h2>Total NO. of feeds remaining: {{ $totalfeedsremaining }}</h2>
                </div>
            </div>
        </a>
        {{-- <div class="bg-yellow-200 flex justify-center p-2 rounded-lg shadow-md flex-col">
            


        </div> --}}
        {{-- <div class="bg-cyan-200 flex justify-center p-2 rounded-lg shadow-md flex-col">

        </div> --}}
        <a href="{{ route('viewvaccines') }}">

            <div class="users bg-yellow-400 flex justify-center p-2 rounded-lg shadow-md flex-col">
                <div class="image" style="padding-right: 10px;"><img src="{{ asset('images/vaccines.png') }}"
                        alt="group">
                </div>
                <div>

                    <h2>Total NO. of vaccines remaining: {{ $totalvaccineremaining }}</h2>


                    <h2>Total NO. of vaccines bought till date: {{ $totalvaccine }}</h2>
                    <h2>Total NO. of vaccines used till date:
                        {{ $totaluservaccine }}
                    </h2>
                </div>

            </div>
        </a>
        {{-- <div class="bg-green-200 flex justify-center p-2 rounded-lg shadow-md flex-col">

        </div>
        <div class="bg-blue-200 flex justify-center p-2 rounded-lg shadow-md flex-col">

        </div> --}}
        <a href="{{ route('poultrydailydetail') }}">

            <div class="userss bg-green-200 flex justify-center p-2 rounded-lg shadow-md flex-col">
                <div class="image">
                    <center>

                        <img src="{{ asset('images/eggs.png') }}" alt="group">
                    </center>
                </div>
                <div>
                    <div>
                        <p>Total Number of eggs:
                            @if (count($poultry) > 0)
                                {{ $poultry[0]->number_of_eggs }}
                            @else
                                0.00
                            @endif
                        </p>
                        <p>
                            Total Number of birds:
                            @if (count($poultry) > 0)
                                {{ $poultry[0]->number_of_birds }}
                            @else
                                0.00
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="flex justify-end p-3">
        <a class="bg-blue-500 mx-3  text-white py-3 px-4 rounded " href="{{ route('poultrydailydetail') }}">Poultry
            Daily
            Report</a>
        <a class="bg-blue-500   text-white py-3 px-4 rounded " href="{{ route('farmexpenses') }}">Farm Financies</a>
    </div>
@endsection
