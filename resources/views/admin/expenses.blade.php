@extends('layouts.app')
@section('section')
    <div class="" style="margin-bottom: 50px;">
        <div class="flex justify-end p-2">Total Expenses = (&#8358;){{ $totalexpenses }}</div>
        <h3 class=" mt-5 ">Expenses</h3>
        <hr>
        <div class="mt-5 ">
            <table class="w-6/12 border-seperate">

                <thead>
                    <tr>
                        <th class="border">Description</th>
                        <th class="border">Cost</th>
                    </tr>
                </thead>
                <tbody class="border-seperate">
                    @foreach ($user as $item)
                        <tr class="">

                            <td class="border p-3">Salary to be paid to {{ $item->name }} whose position is
                                {{ $item->position }}
                            </td>
                            <td class="border">{{ $item->salary }}
                        </tr>
                    @endforeach
                    @foreach ($feed as $item)
                        <tr class="">

                            <td class="border p-3">
                                <p>
                                    Name of feed: {{ $item->name_of_feed }},
                                </p>
                                category of
                                feed:{{ $item->category_of_feed }}, quantity bought:{{ $item->quantity_of_feed }},
                            </td>

                            <td class="border">{{ $item->price_of_feed }}</td>
                        </tr>
                    @endforeach
                    @foreach ($vaccine as $item)
                        <tr class="">

                            <td class="border p-3">Name of Vaccine: {{ $item->name_of_vaccine }},
                                Quantity:{{ $item->quantity }}</td>

                            <td class="border">{{ $item->price }}
                        </tr>
                    @endforeach
                    @foreach ($chick as $item)
                        <tr class="">

                            <td class="border p-3">Name of company:{{ $item->company_name }}
                                <p>Type of chick bought:{{ $item->category }}</p>
                                <p>Quanitity:{{ $item->quantity }}</p>
                            </td>
                            <td class="border">{{ $item->total_price }}
                        </tr>
                    @endforeach
                    @foreach ($expenses as $item)
                        <tr class="">

                            <td class="border p-3">user Expense:{{ $item->subject }},Reference:{{ $item->reference }}</td>

                            <td class="border p-3">{{ $item->possible_cost }}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div>
            <h3 class=" mt-5 ">Feed Expenses</h3>
            <hr>
            @if (count($feed) > 0)
                <div class="mt-5 ">
                    <table class="w-6/12 border-seperate">

                        <thead>
                            <tr>
                                <th class="border">Name of Feed</th>
                                <th class="border">Category of Feed</th>
                                <th class="border">Quantity of Feed</th>
                                <th class="border">Cost of Feed </th>
                            </tr>
                        </thead>
                        <tbody class="border-seperate">

                            <tr class="text-center">
                                <td class="border" colspan="3">Total</td>
                                <td class="border">{{ $totalfeedcost }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <p>No Feed Bought Yet</p>
            @endif
        </div> --}}

        {{-- <div>
            <h3 class=" mt-5 ">Vaccine Expenses</h3>
            <hr>
            @if (count($vaccine) > 0)
                <div class="mt-5 ">
                    <table class="w-6/12 border-seperate">

                        <thead>
                            <tr>
                                <th class="border">Name of Vaccine</th>
                                <th class="border">Quantity of Vaccine</th>
                                <th class="border">Cost of Vaccine </th>
                            </tr>
                        </thead>
                        <tbody class="border-seperate">

                            <tr class="text-center">
                                <td class="border" colspan="2">Total</td>
                                <td class="border">{{ $totalvaccinecost }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <p>No Vaccine Bought Yet</p>
            @endif
        </div>
        <div>
            <h3 class=" mt-5 "> Chick Expenses</h3>
            <hr>
            @if (count($chick) > 0)
                <div class="mt-5 ">
                    <table class="w-6/12 border-seperate">

                        <thead>
                            <tr>
                                <th class="border">Name of Company</th>
                                <th class="border">Type of Chick</th>
                                <th class="border">Quanitity Bought</th>
                                <th class="border">Price</th>
                            </tr>
                        </thead>
                        <tbody class="border-seperate">

                            <tr class="text-center">
                                <td class="border" colspan="3">Total</td>
                                <td class="border">{{ $totalchickcost }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <p>No Chick Bought Yet</p>
            @endif
        </div>
        <h3 class=" mt-5 "> Other Expenses</h3>
        <hr>
        @if (count($expenses) > 0)
            <div class="mt-5 ">
                <table class="w-6/12 border-seperate">

                    <thead>
                        <tr>
                            <th class="border">Subject</th>
                            <th class="border">Reference</th>
                            <th class="border">Possible Cost</th>
                        </tr>
                    </thead>
                    <tbody class="border-seperate">

                        <tr class="text-center">
                            <td class="border" colspan="2">Total</td>
                            <td class="border">{{ $totaluserexpenses }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <p>No Expenses Yet</p>
        @endif
    </div> --}}
    </div>
@endsection
