@extends('layouts.app')
@section('section')
    <div class="" style="margin-bottom: 50px;">
        <div class="flex justify-end p-2">Total Expenses = (&#8358;){{ $totalexpenses }}</div>
        <h3 class=" mt-5 ">Users Expenses</h3>
        <hr>
        <div class="mt-5 ">
            <table class="w-6/12 border-seperate">

                <thead>
                    <tr>
                        <th class="border">Name</th>
                        <th class="border">Rank</th>
                        <th class="border">Salary
                        </th>
                    </tr>
                </thead>
                <tbody class="border-seperate">
                    @foreach ($user as $item)
                        <tr class="text-center">

                            <td class="border p-3">{{ $item->name }}</td>
                            <td class="border">{{ $item->position }}</td>
                            <td class="border">{{ $item->salary }}
                        </tr>
                    @endforeach
                    <tr class="text-center">
                        <td class="border" colspan="2">Total</td>
                        <td class="border">{{ $usersalary }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
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
                            @foreach ($feed as $item)
                                <tr class="text-center">

                                    <td class="border p-3">{{ $item->name_of_feed }}</td>
                                    <td class="border">{{ $item->category_of_feed }}</td>
                                    <td class="border">{{ $item->quantity_of_feed }}
                                    <td class="border">{{ $item->price_of_feed }}
                                </tr>
                            @endforeach
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
        </div>

        <div>
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
                            @foreach ($vaccine as $item)
                                <tr class="text-center">

                                    <td class="border p-3">{{ $item->name_of_vaccine }}</td>
                                    <td class="border">{{ $item->quantity }}
                                    <td class="border">{{ $item->price }}
                                </tr>
                            @endforeach
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
                            @foreach ($chick as $item)
                                <tr class="text-center">

                                    <td class="border p-3">{{ $item->company_name }}</td>
                                    <td class="border ">{{ $item->category }}</td>
                                    <td class="border">{{ $item->quantity }}
                                    <td class="border">{{ $item->total_price }}
                                </tr>
                            @endforeach
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
                        @foreach ($expenses as $item)
                            <tr class="text-center">

                                <td class="border p-3">{{ $item->subject }}</td>
                                <td class="border ">{{ $item->reference }}</td>
                                <td class="border">{{ $item->possible_cost }}
                            </tr>
                        @endforeach
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
    </div>
    </div>

@endsection
