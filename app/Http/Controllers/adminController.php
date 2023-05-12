<?php

namespace App\Http\Controllers;

use App\Models\chickpurchase;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\vaccine;
use App\Models\feed;
use App\Models\products;
use App\Models\Userexpenses;
use App\Models\Userfeed;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    public function dashboard()
    {
        $totalusers = User::where('role', '0')->count();
        $totalfeeds = DB::table('feeds')->sum('quantity_of_feed');
        $totaluserfeeds = DB::table('userfeeds')->sum('quantity_consumed');
        // 
        $totalfeedsremaining = $totalfeeds - $totaluserfeeds;
        // 
        $totalvaccine = DB::table('vaccines')->sum('quantity');
        // 
        $totaluservaccine = DB::table('uservaccines')->sum('quantity_consumed');
        // 
        $totalvaccineremaining = $totalvaccine - $totaluservaccine;
        //   
        $poultry = DB::table('poultrydailies')->orderBy('created_at', 'desc')->first();
        // 
        return view('admin/adminDashboard')->with([
            'totalusers' => $totalusers,
            'poultry' => $poultry,
            'totalfeeds' => $totalfeeds,
            'totaluserfeeds' => $totaluserfeeds,
            'totalfeedsremaining' => $totalfeedsremaining,
            'totalvaccine' => $totalvaccine,
            'totaluservaccine' => $totaluservaccine,
            'totalvaccineremaining' => $totalvaccineremaining
        ]);
    }
    public function showUsers()
    {
        $user = User::where('role', '0')->get();
        return view('admin/createUsers')->with('user', $user);
    }
    public function deleteUsers($id)
    {
        $user = User::find($id);
        // dd("public/storage/user_image/$user->image");
        Storage::delete("public/user_image/$user->image");
        $user->delete();
        return back()->with('success', 'user successfully deleted');
    }
    public function addUsers(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required',
            'address' => 'required',
            'salary' => 'required',
            'position' => 'required',
            'date' => 'required',
            'password' => 'required',
            'user_image.*' => 'image|nullable|max:1024'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->salary = $request->salary;
        $user->position = $request->position;
        $user->date_employed = $request->date;
        $user->password = bcrypt($request->password);

        if ($request->hasFile('user_image')) {
            $filenamewithext = $request->file('user_image')->getClientOriginalName();
            $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
            $extention = $request->file('user_image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extention;
            $request->file('user_image')->storeAs('public/user_image', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $user->image = $fileNameToStore;
        $user->save();
        return redirect()->back();
    }
    public function feeds()
    {
        $feed = feed::orderBy('created_at', 'desc')->limit(4)->get();
        return view('admin/feeds')->with('feeds', $feed);
    }
    public function deletefeeds($id)
    {
        $feed = feed::find($id);
        $feed->delete();
        return redirect()->back()->with('success', 'feed successfully deleted');
    }
    public function postFeeds(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'total_quantity' => 'required',
            'cost' => 'required',
            'category' => 'required',
            'size' => 'required',
        ]);
        $feed = new feed();
        $feed->name_of_feed = $request->name;
        $feed->price_of_feed = $request->cost;
        $feed->quantity_of_feed = $request->total_quantity;
        $feed->category_of_feed = $request->category;
        $feed->size_of_feed = $request->size;
        $feed->save();
        return redirect()->back()->with('success', 'feed successfully added');
    }

    public function postVaccine(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'expiry_date' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $vaccine = new vaccine();
        $vaccine->name_of_vaccine = $request->name;
        $vaccine->expiry_date = $request->expiry_date;
        $vaccine->quantity = $request->quantity;
        $vaccine->price = $request->price;
        $vaccine->description_of_vaccine = $request->description;
        $vaccine->save();
        return redirect()->back()->with('success', 'vaccine successfully added');
    }
    public function vaccine()
    {
        // $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $vaccine = vaccine::orderBy('created_at', 'desc')->limit(4)->get();
        return view('admin/vaccine')->with('vaccine', $vaccine);
    }
    public function deletevaccine($id)
    {
        $vaccine = vaccine::find($id);
        $vaccine->delete();
        return redirect()->back()->with('success', 'vaccine successfully deleted');
    }
    public function products()
    {
        $product = products::orderBy('created_at', 'desc')->limit(4)->get();
        return view('admin/products')->with('products', $product);
    }
    public function viewvaccines()
    {
        $vaccine = vaccine::all();
        return view('single/adminvaccine')->with('vaccine', $vaccine);
    }
    public function viewfeeds()
    {
        $feed = feed::all();
        return view('single/adminfeed')->with('feed', $feed);
    }
    public function productstore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);
        $product = new products();
        $product->name_of_product = $request->name;
        $product->price_of_product = $request->price;
        $product->quantity_of_product = $request->quantity;
        $product->quantity_of_eggs_used = $request->quantity_of_eggs_used;
        $product->number_of_birds = $request->number_of_birds;
        $product->product_category = $request->category;
        $product->product_descripiton = $request->description;
        $product->save();
        return redirect()->back()->with('success', 'product successfully added');
    }
    public function deleteproduct($id)
    {
        $product = products::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'product successfully deleted');
    }
    public function chickpurchase()
    {
        return view('admin/chickpurchase');
    }
    public function chickstore(Request $request)
    {
        $chick = new chickpurchase();
        $this->validate($request, [
            'chick_type' => 'required',
            'name' => 'required',
            'quantity_bought' => 'required',
            'unit_price' => 'required',
            'total_price' => 'required',
        ]);
        $chick->category = $request->chick_type;
        $chick->company_name = $request->name;
        $chick->quantity = $request->quantity_bought;
        $chick->unit_price = $request->unit_price;
        $chick->yield = $request->yield;
        $chick->total_price = $request->total_price;
        $chick->save();
        return redirect()->back()->with('success', 'Chick Purchase Successfully Added');
    }
    public function expenses()
    {
        $userssalary = DB::table('users')->where('role', '0')->sum('salary');
        // 
        $user = User::where('role', '0')->get();
        // 
        $feed = feed::all();
        // 
        $totalfeedcost = DB::table('feeds')->sum('price_of_feed');
        // 
        $vaccine = vaccine::all();
        // 
        $totalvaccinecost = DB::table('vaccines')->sum('price');
        // 
        $chick = chickpurchase::all();
        // 
        $totalchickcost = DB::table('chickpurchases')->sum('total_price');
        // 
        $expenses = Userexpenses::all();
        // 
        $totaluserexpenses = DB::table('userexpenses')->sum('possible_cost');
        // 
        $totalexpenses = $userssalary +  $totalfeedcost  + $totalvaccinecost + $totalchickcost + $totaluserexpenses;
        return view('admin/expenses')->with([
            'usersalary' => $userssalary,
            'user' => $user,
            'totalfeedcost' => $totalfeedcost,
            'feed' => $feed,
            'vaccine' => $vaccine,
            'totalvaccinecost' => $totalvaccinecost,
            'totalchickcost' => $totalchickcost,
            'chick' => $chick,
            'expenses' => $expenses,
            'totaluserexpenses' => $totaluserexpenses,
            'totalexpenses' => $totalexpenses
        ]);
    }
    public function farmexpenses()
    {
        $userssalary = DB::table('users')->where('role', '0')->sum('salary');
        // 
        $totalfeedcost = DB::table('feeds')->sum('price_of_feed');
        // 
        $totalvaccinecost = DB::table('vaccines')->sum('price');
        // 
        $totalchickcost = DB::table('chickpurchases')->sum('total_price');
        // 
        $totaluserexpenses = DB::table('userexpenses')->sum('possible_cost');
        // 
        $totalexpenses = $userssalary +  $totalfeedcost  + $totalvaccinecost + $totalchickcost + $totaluserexpenses;
        // 
        $totalsales = DB::table('orders')->sum('unit_price');
        // decrypt()
        return view('admin/farmexpenses')->with([
            'totalexpenses' => $totalexpenses,
            'totalsales' => $totalsales
        ]);
    }
}
