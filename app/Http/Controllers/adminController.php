<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\vaccine;
use App\Models\feed;
use App\Models\products;
use App\Models\Userfeed;
use Illuminate\Support\Facades\DB;

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
        return view('admin/adminDashboard')->with([
            'totalusers' => $totalusers,
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
}
