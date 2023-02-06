<?php

namespace App\Http\Controllers;

use App\Models\Userexpenses;
use App\Models\Userfeed;
use App\Models\Uservaccine;
use Illuminate\Http\Request;

class showAll extends Controller
{
    public function showfeeds()
    {
        $feed = Userfeed::all();
        return view('show/showalluserfeeds')->with('feed', $feed);
    }
    public function showvaccine()
    {
        // dd('ahhh');
        $vaccine = Uservaccine::all();
        return view('show/showalluservaccine')->with('vaccine', $vaccine);
    }
    public function showallexpenses()
    {
        // dd('ahhh');
        $expenses = Userexpenses::all();
        return view('show/showallexpenses')->with('expenses', $expenses);
    }
}
