<?php

namespace App\Http\Controllers;

use App\Models\chickpurchase;
use App\Models\feed;
use App\Models\sales;
use App\Models\products;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\poultrydaily;
use App\Models\Userexpenses;
use App\Models\Userfeed;
use App\Models\Uservaccine;
use App\Models\vaccine;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function dashboard()
    {
        $currentdate = Carbon::now();
        // 
        $feedsusedtoday = Userfeed::whereDate('created_at', '=', $currentdate)->get()->sum('quantity_consumed');
        // 
        $vaccineusedtoday = Uservaccine::whereDate('created_at', '=', $currentdate)->get()->sum('quantity_consumed');
        // 
        $totalfeeds = DB::table('feeds')->sum('quantity_of_feed');
        // 
        $totalvaccine = DB::table('vaccines')->sum('quantity');
        // 
        $totaluservaccine = DB::table('uservaccines')->sum('quantity_consumed');
        // 
        $totaluserfeeds = DB::table('userfeeds')->sum('quantity_consumed');
        // 
        $totalfeedsremaining = $totalfeeds - $totaluserfeeds;
        // 
        $totalvaccineremaining = $totalvaccine - $totaluservaccine;
        // 
        return view('users/userDashboard')->with(['totalfeedsremaining' => $totalfeedsremaining, 'totaluserfeeds' => $totaluserfeeds, 'feedsusedtoday' => $feedsusedtoday, 'totalvaccineremaining' => $totalvaccineremaining, 'totaluservaccine' => $totaluservaccine, 'vaccineusedtoday' => $vaccineusedtoday]);
    }
    public function showsales()
    {
        $product = products::all();
        $cart = session()->get('cartProduct');
        return view('users/sales')->with(['product' => $product, 'cart' => $cart]);
    }
    public function deletefeed($id)
    {
        $feed = Userfeed::find($id);
        $feed->delete();
        return redirect()->back()->with('success', 'Feed Succefully Deleted');
    }
    public function showSingleOrder($id)
    {
        $orders = Order::where('order_id', '=', $id)->get();
        // dd($orders);
        return view('single/single')->with('orders', $orders);
    }
    public function updatestatus(Request $request, $id)
    {
        $orders = Order::where('order_id', '=', $id)->get();
        foreach ($orders as $order) {
            $order->status = $request->status;
            $order->save();
        }
        return redirect()->back()->with('success', 'Status updated');
    }
    public function saveorder(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required',
            'customer_number' => 'required',
            'customer_email' => 'required',
            'customer_address' => 'required',
        ]);
        $name = $request->customer_name;
        $number = $request->customer_number;
        $email = $request->customer_email;
        $address = $request->customer_address;
        $method = $request->payment_method;
        $status = $request->status;
        $cart = session()->get('cartProduct');
        $order_id = uniqid();
        // dd("$status $method $order_id");
        foreach ($cart as $item) {
            $unit_price = $item['product']['price_of_product'] * $item['quantity'];
            DB::table('orders')->insert([
                'order_id' => $order_id,
                'product_category' => $item['product']['product_category'],
                'product_name' => $item['product']['name_of_product'],
                'quantity' => $item['quantity'],
                // $item['product']['price_of_product'] * $item['quantity']
                'unit_price' => $unit_price,
                'customer_name' => $name,
                'customer_number' => $number,
                'customer_email' => $email,
                'customer_address' => $address,
                'payment_method' => $method,
                'status' => $status,
                'created_at' => now(),

            ]);
        }
        $request->session()->forget('cartProduct');
        return redirect()->back()->with('success', 'order successfully placed');
    }
    public function postsales(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'customer_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $sales = new sales();
        $sales->product_name = $request->name;
        $sales->customer_name = $request->customer_name;
        $sales->price_of_product = $request->price;
        $sales->quantity_sold = $request->quantity;
        $sales->save();
        return redirect()->back()->with('success', 'sales successfully added');
    }

    public function vaccine()
    {
        $adminvaccine = vaccine::all();
        $vaccine = Uservaccine::orderBy('created_at', 'desc')->limit(4)->get();
        return view('users/vaccine')->with(['vaccine' => $vaccine, 'adminvaccine' => $adminvaccine]);
    }
    public function addtocart(Request $request)
    {
        $this->validate($request, [
            'quantity' => 'required'
        ]);
        $id = $request->product_id;
        $product = products::find($id);
        if (!session()->has('cartProduct')) {
            session()->put('cartProduct', []);
        }
        $cart = session()->get('cartProduct');
        $cart[$id] = [
            'product' => $product,
            'id' => $product->id,
            'quantity' => $request->quantity
        ];
        session()->put('cartProduct', $cart);
        return redirect()->back()->with('success', 'successfully added to cart');
    }
    public function deletecart($id)
    {
        $cart = session()->get('cartProduct');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cartProduct', $cart);
        }
        return redirect()->back()->with('success', 'cart item removed');
    }
    public function expenses()
    {
        $expenses = Userexpenses::orderBy('created_at', 'desc')->limit(4)->get();
        return view('users/expenses')->with('expenses', $expenses);
    }
    public function showsingleexpense($id)
    {
        $expenses = Userexpenses::find($id);
        return view('single/expenses')->with('expenses', $expenses);
    }
    public function expensesdelete($id)
    {
        $expenses = Userexpenses::find($id);
        $expenses->delete();
        return back()->with('success', 'Expenses deleted');
    }
    public function expensestore(Request $request)
    {
        $this->validate($request, [
            'serial_number' => 'required',
            'subject' => 'required',
            'possible_cost' => 'required',
            'reference' => 'required',
            'description' => 'required',
        ]);
        $expenses = new Userexpenses();
        $expenses->serial_number = $request->serial_number;
        $expenses->subject = $request->subject;
        $expenses->possible_cost = $request->possible_cost;
        $expenses->reference = $request->reference;
        $expenses->description = $request->description;
        $expenses->save();
        return redirect()->back()->with('success', 'Expense Successfully Added');
    }
    public function showorders()
    {
        $currentdate = Carbon::today();
        $totalsales = DB::table('orders')->sum('unit_price');

        $todaysales = Order::whereDate('created_at', '=', $currentdate)->get()->sum('unit_price');
        $order = Order::all();
        return view('users/invoice')->with([
            'order' => $order,
            'todaysales' => $todaysales,
            'totalsales' => $totalsales,
        ]);
    }

    public function vaccinestore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'expiry_date' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]);
        $vaccine = new Uservaccine();
        $vaccine->name_of_vaccine = $request->name;
        $vaccine->expiry_date = $request->expiry_date;
        $vaccine->quantity_consumed = $request->quantity;
        $vaccine->description_of_vaccine = $request->description;
        $vaccine->save();
        return redirect()->back()->with('success', 'Vaccine Successfully Added');
    }
    public function singlevaccine($id)
    {
        $vaccine = Uservaccine::find($id);
        return view('single/uservaccine')->with('vaccine', $vaccine);
    }
    public function feed()
    {
        $adminFeed = feed::all();
        $totaluserfeed = DB::table('userfeeds')->sum('quantity_consumed');
        $totalsize = DB::table('userfeeds')->sum('size_of_feed');
        $feed = Userfeed::orderBy('created_at', 'desc')->limit(4)->get();
        // dd(count($feed));
        return view('users/feed')->with(['feed' => $feed, 'adminfeed' => $adminFeed, 'totaluserfeed' => $totaluserfeed, 'totalusersize' => $totalsize]);
    }
    public function showsinglefeed($id)
    {
        $feed = Userfeed::find($id);
        return view('single/userfeeds')->with('feed', $feed);
    }
    public function showdisease()
    {
        return view('users/disease');
    }
    public function poultrydaily()
    {
        return view('users/poultry-products');
    }
    public function poultrydailystore(Request $request)
    {

        $this->validate($request, [
            'number_of_birds' => 'required',
            'number_of_eggs' => 'required',
            'yield_of_broilers' => 'required',
        ]);
        $daily = new poultrydaily();
        $daily->number_of_eggs = $request->number_of_eggs;
        $daily->number_of_birds = $request->number_of_birds;
        $daily->number_of_damaged_eggs = $request->damaged_eggs;
        $daily->yield_for_broilers = $request->yield_of_broilers;
        $daily->number_of_birds_dead = $request->dead_birds;
        $daily->save();
        return redirect()->back()->with('success', 'Daily Report successfully added');
    }
    public function feedstore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'quantity_consumed' => 'required',
            'category' => 'required',
            'size' => 'required',
        ]);
        $feed = new Userfeed();
        $feed->name_of_feed = $request->name;
        $feed->quantity_consumed = $request->quantity_consumed;
        $feed->category_of_feed = $request->category;
        $feed->size_of_feed = $request->size;
        $feed->save();
        return redirect()->back()->with('success', 'feed successfully added');
    }
    public function poultrydailydetail()
    {
        $poultry = DB::table('poultrydailies')->orderBy('created_at', 'desc')->first();
        $chick = DB::table('chickpurchases')->orderBy('created_at', 'desc')->first();
        $chickall = chickpurchase::all();
        // $totalyield 
        return view('users/poultry-daily-details')->with([
            'poultry' => $poultry,
            'chick' => $chick,
            'chickall' => $chickall,
        ]);
    }
}
