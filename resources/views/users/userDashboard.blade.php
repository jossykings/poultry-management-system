@extends('layouts.app')
@section('styles')
    <style>
        .dash {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 20px;

        }

        .dash>div {
            height: 160px;
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
    </style>
@endsection
@section('section')
    <div class="dash w-11/12 my-10">
        <div class="users bg-cyan-200 flex justify-center p-2 rounded-lg shadow-md flex-col">
            <div class="image"><img src="{{ asset('images/chicken.png') }}" alt="group"></div>
            <div>

                <h2>Total Number of Feeds Remaining: &nbsp; &nbsp;&nbsp;
                    @if ($totalfeedsremaining > 0)
                        {{ $totalfeedsremaining }}
                    @else
                        0.00
                    @endif
                </h2>
                <h2>Total Number of Feeds Given Till Date: &nbsp;&nbsp;
                    @if ($totaluserfeeds > 0)
                        {{ $totaluserfeeds }}
                    @else
                        0.00
                    @endif
                </h2>
                <h2>Total Number of feeds used today: &nbsp;&nbsp;
                    @if ($feedsusedtoday > 0)
                        {{ $feedsusedtoday }}
                    @else
                        0.00
                    @endif
                </h2>
            </div>

        </div>
        <div class="users bg-white flex justify-center p-2 rounded-lg shadow-md flex-col">
            <div class="image"><img src="{{ asset('images/vaccines.png') }}" alt="group"></div>

            <div>

                <h2>Total No. of Vaccines remaining:{{ $totalvaccineremaining }}</h2>
                <h2>Total No. of Vaccines Given Till Date:{{ $totaluservaccine }}</h2>
                <h2>Total No. of Vaccines used today:
                    @if ($vaccineusedtoday > 0)
                        {{ $vaccineusedtoday }}
                    @else
                        0.00
                    @endif

                </h2>
            </div>
        </div>

        <div class="users bg-cyan-200 flex justify-center p-2 rounded-lg shadow-md flex-col">
            <div class="image"><img src="{{ asset('images/eggs.png') }}" alt="group"></div>

            <div>

                <p>Total Number of eggs:</p>
                <p>
                    Total Number of birds:
                </p>
            </div>

        </div>
    </div>
@endsection
