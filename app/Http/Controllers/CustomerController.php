<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Corder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Order;
use App\Models\Otp;
use App\Models\Slide;
use App\Models\Eotp;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Mail\NotifyMail;
use App\Mail\ForgetMail;
use App\Mail\AdminMail;
use App\Mail\OtpMail;
use App\Mail\OrderMail;
use App\Mail\Order1Mail;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Str;



class CustomerController extends Controller
{
    public function login()
    {
        $cat = Category::all();
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        return view("customer.login",["cat"=>$cat, "cart"=>$cart]);
    }

    public function login_submit(Request $req)
    {

        $req->validate([
            "email"=>"required",
            "password"=>"required"]);
        $user = User::where("email", $req->get("email"))->first();

        if ($user && Hash::check($req->get("password"), $user->password) && $user->status != 0)
        {
            Session::put('name', $user->f_name);
            Session::put('email', $user->email);
            Session::put('customer_id', $user->id);
            // Cart::where('customer_email', $user->email)->update(['session_id' => Session::getId()]);
            Cart::where('session_id', Session::getId())->update(['customer_id' => $user->id,'customer_email' => $user->email,'customer_name' => $user->f_name,'address' => $user->address1,]);
            Cart::where('customer_email', $user->email)->update(['session_id' => Session::getId()]);
            Alert::success('Congrates!', 'Login in Successfully');
            return redirect()->to('/');
        }
        else
        {
            Alert::error('Invalid Login!', 'Email or Password is invalid');
            return back();
        }
    }

    public function userregister()
    {
        $cat = Category::all();
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        return view("customer.register",["cat"=>$cat, "cart"=>$cart]);
    }


    public function otp(Request $req)
    {
        $req->validate([
            "f_name" => "required|min:3",
            "l_name" => "required|min:3",
            "address" => "required",
            "country" => "required",
            "city" => "required",
            "postcode" => "required",
            "phone" => "required|unique:users,phone",
            "email" => "required|email|unique:users,email",
            "pass" => "required|min:8",
            "c_pass" => "required|min:8|same:pass",
        ]);

        $randomNumber = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $check = Otp::where("email", $req->get("email"))->delete();
        $optdata = new Otp;
        $optdata->email = $req->get("email");
        $optdata->otp = $randomNumber;
        if($optdata->save())
        {

            Mail::to($req->get("email"))->send(new OtpMail($randomNumber));
            $cat = Category::all();
            $cart = Cart::with('product')->where('session_id', Session::getId())->get();
            Alert::success('Congrates!', 'OTP Send to email');
            return view("customer.otp", ["req"=>$req, "cart"=>$cart, "cat"=>$cat]);
        }
        else
        {
            Alert::error('Invalid Login!', 'Email or Password is invalid');
            return back();
        }

    }

    public function register_submit(Request $req)
    {
        $req->validate([
            "f_name" => "required|min:3",
            "l_name" => "required|min:3",
            "address" => "required",
            "country" => "required",
            "city" => "required",
            "postcode" => "required",
            "phone" => "required|unique:users,phone",
            "email" => "required|email|unique:users,email",
            "pass" => "required|min:8",
            "c_pass" => "required|min:8|same:pass",
            "otp" => "required"
        ]);
        $check = Otp::where("email",$req->get("email"))->first();
        if($check->otp == $req->get("otp"))
        {
            $data = new User;
            $data->f_name = $req->get("f_name");
            $data->l_name = $req->get("l_name");
            $data->address1 = $req->get("address");
            $data->address2 = $req->get("address");
            $data->country = $req->get("country");
            $data->city = $req->get("city");
            $data->postcode = $req->get("postcode");
            $data->phone = $req->get("phone");
            $data->email = $req->get("email");
            $data->role = 3;
            $password = Hash::make($req->get("pass"));
            $data->password = $password;
            $data->status = 1;
            if($data->save())
            {
                Alert::success('Congratulation!', 'Your email has been verified!');
                return redirect()->to('/userlogin');
            }
            else
            {
                Alert::error('Error', 'Some Error Occured1');
                return redirect()->to('/userlogin');
            }
        }
        else
        {
            Alert::error('Error', 'OTP is incorrect!');
            return redirect()->to('/userlogin');
        }
    }

    public function logout()
    {
        session()->forget('name');
        session()->forget('email');
        Alert::success('Congrates!', 'Logout Successfully');
        return redirect()->to('/');
    }

    public function prod_me()
    {
        if(Session::has('name') && Session::has('email'))
        {
            $slides = Slide::all();
            $cart = Cart::with('product')->where('session_id', Session::getId())->get();
            $cart1 = Cart::with('product')->where('session_id', Session::getId())->get();
            $cat = Category::all();
            $prod = Product::where("status", 1)->orderBy('id', 'DESC')->get();
            $sale = Product::where("status", 1)->where("sale_active", 1)->orderBy('id', 'DESC')->get();
            $top = Product::where("status", 1)->where("top", 1)->orderBy('id', 'DESC')->paginate(8);
            $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
            return view("customer.index",["prod"=>$prod, "cat"=>$cat, "sale"=>$sale, "top"=>$top, 'cart'=>$cart, 'wishlist'=>$wishlist, "slides"=>$slides]);
        }
        else
        {
            $slides = Slide::all();
            $cart = Cart::with('product')->where('session_id', Session::getId())->get();
            $cat = Category::all();
            $prod = Product::where("status", 1)->orderBy('id', 'DESC')->get();
            $sale = Product::where("status", 1)->where("sale_active", 1)->orderBy('id', 'DESC')->get();
            $top = Product::where("status", 1)->where("top", 1)->orderBy('id', 'DESC')->paginate(8);
            return view("customer.index",["prod"=>$prod, "cat"=>$cat, "sale"=>$sale, "top"=>$top, "cart"=>$cart, "slides"=>$slides]);
        }

    }

    public function view_product($id)
    {
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $data = Product::where("id",$id)->first();
        $rel_prod = Product::where("category", $data->category,'desc')->take(5)->get();
        $cat = Category::all();
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        return view("customer.view_product", ["data"=>$data, "rel_prod"=>$rel_prod, "cat"=>$cat, "cart"=>$cart, "wishlist"=>$wishlist]);
    }

    public function shop()
    {
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $cat = Category::all();
        $subcat = Subcategory::all();
        $prod = Product::where("status", 1)->orderBy('id', 'DESC')->paginate(12);
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        return view("customer.shop",["prod"=>$prod, "cat"=>$cat, "subcat"=>$subcat, "cart"=>$cart, "wishlist"=>$wishlist]);
    }

    public function view_product_category($id)
    {
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $cat = Category::all();
        $subcat = Subcategory::all();
        $sel_cat = Category::where("id",$id)->first();
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        $prod = Product::where("status", 1)->where("category", $sel_cat->name)->orderBy('id', 'DESC')->paginate(12);
        return view("customer.shop",["prod"=>$prod, "cat"=>$cat, "subcat"=>$subcat, "cart"=>$cart, "wishlist"=>$wishlist]);
    }

    public function view_product_subcategory($id)
    {
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $cat = Category::all();
        $subcat = Subcategory::all();
        $sel_cat = Subcategory::where("id",$id)->first();
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        $prod = Product::where("status", 1)->where("sub_category", $sel_cat->name)->orderBy('id', 'DESC')->paginate(12);
        return view("customer.shop",["prod"=>$prod, "cat"=>$cat, "subcat"=>$subcat, "cart"=>$cart, "wishlist"=>$wishlist]);
    }

    public function add_to_cart(Request $req)
    {
        if(Session::has('name') && Session::has('email'))
        {
            $data = new Cart;
            $data->session_id = Session::getId();
            $data->customer_id = Session::get('customer_id');
            $data->customer_email = Session::get('email');
            $data->customer_name = Session::get('name');
            $data->product_id = $req->get("prod_id");
            $data->product_name = $req->get("prod_name");
            $data->product_qty = $req->get("prod_qty");
            $data->product_price = $req->get("prod_price");
            if($data->save())
            {
                Alert::success('Congrates!', 'Add to cart Successfully');
                return back();
            }
            else
            {
                Alert::error('Error', 'Some Error Occured');
                return back();
            }
        }
        else
        {
            $data = new Cart;
            $data->session_id = Session::getId();
            $data->product_id = $req->get("prod_id");
            $data->product_name = $req->get("prod_name");
            $data->product_qty = $req->get("prod_qty");
            $data->product_price = $req->get("prod_price");
            if($data->save())
            {
                Alert::success('Congrates!', 'Add to cart Successfully');
                return back();
            }
            else
            {
                Alert::error('Error', 'Some Error Occured');
                return back();
            }
        }
    }

    public function cart()
    {
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $cat = Category::all();
        $subcat = Subcategory::all();
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        return view("customer.cart", ["cat"=>$cat, "subcat"=>$subcat, "cart"=>$cart, "wishlist"=>$wishlist]);
    }


    public function remove_cart($id)
    {
        $cart = Cart::where("id",$id)->first();
        if($cart->delete())
        {
            Alert::success('Removed!', 'Product Remove From Cart');
            return back();
        }
        else
        {
            Alert::error('Error', 'Some Error Occured');
            return back();
        }
    }


    public function empty_basket()
    {
        $session_id = Session::getId();
        $data = Cart::where("session_id", $session_id)->delete();
        // dd($data);
        if($data)
        {
            Alert::success('Removed!', 'Product Remove From Cart');
            return back();
        }
        else
        {
            Alert::error('Error', 'Some Error Occured');
            return back();
        }
    }

    public function increaseQty(Request $request)
    {
        $product_id = $request->input('product_id');
        $session_id = $request->input('session_id');

        $cart = Cart::where('product_id', $product_id)
                    ->where('session_id', $session_id)
                    ->first();

        $cart->increment('product_qty');
        $cart->save();

        return response()->json(['success' => true]);
    }

    public function decreaseQty(Request $request)
    {
        $product_id = $request->input('product_id');
        $session_id = $request->input('session_id');

        $cart = Cart::where('product_id', $product_id)
                    ->where('session_id', $session_id)
                    ->first();
        if($cart->product_qty > 1){
            $cart->decrement('product_qty');
            $cart->save();
        }else{
            $cart->delete();
        }
        return response()->json(['success' => true]);
    }

    public function address()
    {
        if(Session::has('name') && Session::has('email'))
        {
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $cat = Category::all();
        $subcat = Subcategory::all();
        $user = User::where("email", Session::get("email"))->first();
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        return view("customer.address", ["cat"=>$cat, "subcat"=>$subcat, "cart"=>$cart, "user"=>$user, "wishlist"=>$wishlist]);
        }
        else
        {
            return redirect()->to('/userlogin');
        }
    }

    public function cart_login(Request $req)
    {
        $req->validate(["email"|"required", "password"|"required"]);
        $user = User::where("email", $req->get("email"))->first();

        if ($user && Hash::check($req->get("password"), $user->password) && $user->status ==1 )
        {
            Session::put('name', $user->f_name);
            Session::put('email', $user->email);
            Session::put('customer_id', $user->id);
            Cart::where('session_id', Session::getId())->update(['customer_id' => $user->id,'customer_email' => $user->email,'customer_name' => $user->f_name,'address' => $user->address1,]);
            Cart::where('customer_email', $user->email)->update(['session_id' => Session::getId()]);
            Alert::success('Congrates!', 'Login in Successfully');
            return back();
        }
        else
        {
            Alert::error('Error', 'Some Error Occured');
            return back();
        }
    }

    public function submit_address(Request $req)
    {
        // dd($req);
        $req->validate([
            "user_name" => "required",
            "user_email" => "required",
            "user_id" => "required",
            "address" => "required",
        ]);

        $data = User::where("f_name",$req->get("user_name"))->where("email", $req->get("user_email"))->where("id", $req->get("user_id"))->first();
        if($data)
        {
            $cart = Cart::with('product')->where('session_id', Session::getId())->get();
            $cat = Category::all();
            $subcat = Subcategory::all();
            $user = User::where("email", Session::get("email"))->first();
            $session_id = Session::getId();

            $result = Cart::where("customer_email", $data->email)->update(['address' => $req->get("address")]);
            // dd($result);
            if($result)
            {
                $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
                return view("customer.payment", ["cat"=>$cat, "subcat"=>$subcat, "cart"=>$cart, "user"=>$user, "wishlist"=>$wishlist]);
            }
        }
        else
        {
            Alert::error('Error', 'Some Error Occured');
            return back();
        }
    }

    public function cashondelivery(Request $req)
    {
        $req->validate([
            "id"=>"required",
            "name"=>"required",
            "email"=>"required",
            "customer_id"=>"required",
        ]);


        $invoice_number = 120000;
        $latest_invoice = Order::orderBy('invoice_number', 'desc')->first();
        if ($latest_invoice)
        {
            $invoice_number = $latest_invoice->invoice_number + 1;
        }

        $cart = Cart::where("session_id",$req->get("id"))->where("customer_name", $req->get("name"))->where("customer_email", $req->get("email"))->where("customer_id", $req->get("customer_id"))->get();
        foreach($cart as $data)
        {
            $order = new Order;
            $order->customer_id = $req->get("customer_id");
            $order->customer_email = $req->get("email");
            $order->customer_name = $req->get("name");
            $order->payment_method = "COD";
            $order->product_id = $data->product_id;
            $order->product_name = $data->product_name;
            $order->product_qty = $data->product_qty;
            $order->product_price = $data->product_price;
            $order->address = $data->address;
            $order->status = 0;
            $order->invoice_number = $invoice_number;
            $order->save();
        }

        // $firstEmail = collect(array_values($cart->email))->first();
        // dd($firstEmail);


        $details = [
            'name' => $req->get("name"),
            'invoice_number' => $invoice_number,
            'email' => $req->get("email"),

        ];

        Mail::to($req->get("email"))->send(new OrderMail($details));
        Mail::to("haideraamir07@gmail.com")->send(new Order1Mail($details));
        $cart1 = Cart::where("session_id",$req->get("id"))->where("customer_name", $req->get("name"))->where("customer_email", $req->get("email"))->where("customer_id", $req->get("customer_id"))->delete();
        if($cart)
        {
            Alert::success('Congrates!', 'Order Placed.');
            return Redirect::to('/');
        }
        else
        {
            Alert::error('Error', 'Some Error Occured');
            return Redirect::to('/');
        }
    }

    public function aboutus()
    {
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $cat = Category::all();
        $subcat = Subcategory::all();
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        return view("customer.about-us", ["cart"=>$cart, "cat"=>$cat, "subcat"=>$subcat, "wishlist"=>$wishlist]);
    }

    public function contactus()
    {
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $cat = Category::all();
        $subcat = Subcategory::all();
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        return view("customer.contact-us", ["cart"=>$cart, "cat"=>$cat, "subcat"=>$subcat, "wishlist"=>$wishlist]);
    }

    public function contactus_submit(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "subject" => "required",
            "message" => "required",
        ]);

        $details = [
            'name' => $request->get("name"),
            'email' => $request->get("email"),
            'phone' => $request->get("phone"),
            'subject' => $request->get("subject"),
            'message' => $request->get("message"),
        ];

        Mail::to('haideraamir07@gmail.com')->send(new AdminMail($details));
        Mail::to($request->get("email"))->send(new NotifyMail($details));
        Alert::success('Done!', 'Team will contact you as soon as possible.');
        return back();
    }

    public function search(Request $request)
    {

        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $cat = Category::all();
        $subcat = Subcategory::all();
        // $sel_cat = Category::where("id",$id)->first();
        // $prod = Product::where("status", 1)->where("category", $sel_cat->name)->orderBy('id', 'DESC')->paginate(12);

        $searchTerm = $request->get('prod_name');
        $prod = Product::where('name', 'like', '%'.$searchTerm.'%')->orderBy('id', 'DESC')->paginate(12);
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        return view('customer.shop', ["cart"=>$cart, "cat"=>$cat, "subcat"=>$subcat, "prod"=>$prod, "wishlist"=>$wishlist]);
    }

    public function profile($email)
    {
        $user_email = Session::get("email");
        if($user_email == $email)
        {
            $cart = Cart::with('product')->where('session_id', Session::getId())->get();
            $cat = Category::all();
            $subcat = Subcategory::all();
            $user = User::where("email", $email)->first();
            $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
            return view("customer.account", ["cart"=>$cart, "cat"=>$cat, "subcat"=>$subcat, "user"=>$user, "wishlist"=>$wishlist]);
        }
        else
        {
            Alert::error('OOPS!', 'Some issue is occuring.');
            return back();
        }
    }

    public function manage_address($email)
    {
        $user_email = Session::get("email");
        if($user_email == $email)
        {
            $cart = Cart::with('product')->where('session_id', Session::getId())->get();
            $cat = Category::all();
            $subcat = Subcategory::all();
            $user = User::where("email", $email)->first();
            $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
            return view("customer.manage-address", ["cart"=>$cart, "cat"=>$cat, "subcat"=>$subcat, "user"=>$user, "wishlist"=>$wishlist]);
        }
        else
        {
            Alert::error('OOPS!', 'Some issue is occuring.');
            return back();
        }
    }


    public function my_orders($email)
    {
        $user_email = Session::get("email");
        if($user_email == $email)
        {
            $cart = Cart::with('product')->where('session_id', Session::getId())->get();
            $cat = Category::all();
            $subcat = Subcategory::all();
            $user = User::where("email", $email)->first();
            $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
            // $order = Order::where('customer_email', $email)
            // ->select(DB::raw('DATE(created_at) as date'), 'address', 'invoice_number', DB::raw('sum(product_price * product_qty) as total_price'), 'status')
            // ->groupBy(DB::raw('DATE(created_at)'), 'address', 'invoice_number', 'status')
            // ->orderBy('id', 'DESC')->get();
            $order = Order::where('customer_email', $email)
            ->select(DB::raw('DATE(created_at) as date'), 'address', 'invoice_number', DB::raw('sum(product_price * product_qty) as total_price'), 'status', 'id')
            ->groupBy(DB::raw('DATE(created_at)'), 'address', 'invoice_number', 'status', 'id')
            ->orderBy('id', 'DESC')
            ->get();
            return view("customer.orders", ["cart"=>$cart, "cat"=>$cat, "subcat"=>$subcat, "user"=>$user, "order"=>$order, "wishlist"=>$wishlist]);
        }
        else
        {
            Alert::error('OOPS!', 'Some issue is occuring.');
            return back();
        }
    }

    public function update_user_name(Request $req)
    {
        $req->validate([
            "f_name" => "required",
            "l_name" => "required",
            "user_email" => "required",
        ]);

        $data = User::where('email', $req->get("user_email"))->update(['f_name' => $req->get("f_name"), 'l_name' => $req->get("l_name")]);
        if($data)
        {
            Alert::success('Done!', 'Your name has been changed successfully!.');
            return back();
        }
        else
        {
            Alert::error('OOPS!', 'Some issue is occuring.');
            return back();
        }
    }

    public function change_user_password(Request $req)
    {
        $req->validate([
            "user_email" => "required",
            "current_password" => "required",
            "new_password" => "required|min:8",
            "confirm_password" => "required|min:8|same:new_password",
        ]);

        if($req->get("user_email") == Session::get("email"))
        {
            $user = User::where("email", $req->get("user_email"))->first();

            if ($user && Hash::check($req->get("current_password"), $user->password))
            {
                $password = Hash::make($req->get("new_password"));
                $record = User::where('email', $req->get("user_email"))->update(['password' => $password]);
                if($record)
                {
                    Alert::success('Done!', 'Your password has been changed successfully!.');
                    return back();
                }
                else
                {
                    Alert::error('OOPS!', 'Some issue is occuring.2');
                    return back();
                }
            }
            else
            {
                Alert::error('OOPS!', 'Some issue is occuring.1');
                return back();
            }

        }
    }

    public function update_personal_details(Request $req)
    {
        $req->validate([
            "email"=>"required",
            "address"=>"required",
            "city"=>"required",
            "postcode"=>"required",
            "country"=>"required",
            "phone"=>"required",
        ]);

        if($req->get("email") == Session::get("email"))
        {
            $data = User::where('email', $req->get("email"))->update(['address1' => $req->get("address"), 'city' => $req->get("city"), 'postcode' => $req->get("postcode"), 'country' => $req->get("country"), 'phone' => $req->get("phone")]);
            if($data)
            {
                Alert::success('Done!', 'Your details has been changed successfully!.');
                return back();
            }
            else
            {
                Alert::error('OOPS!', 'Some issue is occuring.1');
                return back();
            }
        }
        else
        {
            Alert::error('OOPS!', 'Some issue is occuring.1');
            return back();
        }
    }

    public function generate_pdf($invoice_number)
    {
        $orders = Order::where('invoice_number', $invoice_number)
            ->select('invoice_number', 'created_at as date', 'address', 'payment_method', DB::raw('sum(product_price * product_qty) as total_price'), 'status', 'customer_email')
            ->groupBy('invoice_number', 'created_at', 'address', 'payment_method', 'status', 'customer_email')
            ->get();
        $products = Order::where("invoice_number", $invoice_number)->get();
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $cat = Category::all();
        $subcat = Subcategory::all();
        $user = User::where("email", Session::get("email"))->first();
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        return view("customer.general", ["cart"=>$cart, "cat"=>$cat, "subcat"=>$subcat, "order"=>$orders, "products"=>$products, "user"=>$user, "wishlist"=>$wishlist]);
    }


    public function add_wishlist(Request $request)
    {
        $productId = $request->input('product_id');
        $customerId = $request->input('customer_id');
        $product = Product::find($productId);
        $customer = User::where("id", $customerId)->first();
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        $existingWishlistItem = Wishlist::where('user_id', $customerId)->where('product_id', $productId)->first();

        if ($existingWishlistItem)
        {
            $res = Wishlist::where('user_id', $customerId)->where('product_id', $productId)->delete();
            if($res)
            {
                $response = "ok";
                return $response;
                // return response()->json(['success' => true, 'message' => 'Product added to wishlist']);
            }
            else
            {
                $response = "ok";
                return $response;
                return response()->json(['success' => true, 'message' => 'Product removed from wishlist']);
            }
        }

        $wishlistItem = new Wishlist;
        $wishlistItem->user_id = $customerId;
        $wishlistItem->product_id = $productId;
        $wishlistItem->save();
        $response = "ok";
        return $response;
        // return response()->json(['success' => true, 'message' => 'Product added to wishlist']);
    }

    public function my_wishlist($email)
    {
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $cat = Category::all();
        $subcat = Subcategory::all();
        $user = User::where("email", $email)->first();
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        return view("customer.wishlist", ["cart"=>$cart, "cat"=>$cat, "subcat"=>$subcat, "user"=>$user, "wishlist"=>$wishlist]);
    }

    public function delete_wishlist($id)
    {

        $data = Wishlist::where("product_id",$id)->where("user_id", Session::get("customer_id"))->delete();
        if($data)
        {
            Alert::success('Done!', 'Product removed from wishlist.');
            return back();
        }
        else
        {
            Alert::error('OOPS!', 'Some issue is occuring.1');
            return back();
        }
    }

    public function policy()
    {

        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $cat = Category::all();
        $subcat = Subcategory::all();
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        return view("customer.shipping-return", ["cart"=>$cart, "cat"=>$cat, "subcat"=>$subcat, "wishlist"=>$wishlist]);
    }

    public function priavry_policy()
    {
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $cat = Category::all();
        $subcat = Subcategory::all();
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        return view("customer.privacy-policy", ["cart"=>$cart, "cat"=>$cat, "subcat"=>$subcat, "wishlist"=>$wishlist]);
    }

    public function term_condition()
    {
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $cat = Category::all();
        $subcat = Subcategory::all();
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        return view("customer.terms-conditions", ["cart"=>$cart, "cat"=>$cat, "subcat"=>$subcat, "wishlist"=>$wishlist]);
    }

    public function forgot_password()
    {
        $cart = Cart::with('product')->where('session_id', Session::getId())->get();
        $cat = Category::all();
        $subcat = Subcategory::all();
        $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
        return view("customer.forget",  ["cart"=>$cart, "cat"=>$cat, "subcat"=>$subcat, "wishlist"=>$wishlist]);
    }

    public function forget_email_confirm(Request $request)
    {
        $request->validate(["email"=>"required"]);

        $data = User::where("email", $request->get("email"))->first();

        if($data)
        {
            Eotp::where("email", $data->email)->delete();
            $randomString = Str::random(50);
            $insert = new Eotp;
            $insert->verification_code = $randomString;
            $insert->email = $request->get("email");
            if($insert->save())
            {
                $details = [
                    'name' => $data->first_name,
                    'email' => $request->get("email"),
                    'code' => $randomString
                ];
                Mail::to($request->get("email"))->send(new ForgetMail($details));
                Alert::success('Done!', 'password change reuquest has been sent. Check your email');
                return back();
            }
            else
            {
                Alert::error('OOPS!', 'Some issue is occuring!');
                return back();
            }
        }
        else
        {
            Alert::error('Error!', 'Email is not registered');
            return back();
        }
    }

    public function reset_password($code)
    {
        $data = Eotp::where("verification_code", $code)->first();
        if($data)
        {
            $cart = Cart::with('product')->where('session_id', Session::getId())->get();
            $cat = Category::all();
            $subcat = Subcategory::all();
            $wishlist = Wishlist::where("user_id", Session::get("customer_id"))->get();
            return view("customer.reset-password",  ["cart"=>$cart, "cat"=>$cat, "subcat"=>$subcat, "wishlist"=>$wishlist, "email"=>$data->email]);
        }
        else
        {
            Alert::error('Error!', 'Password reset failed!');
            return redirect("/");
        }
    }

    public function save_password(Request $request)
    {
        $request->validate([
            "email"=>"required",
            "password"=>"required|min:8",
            "confirm_password"=>"required|min:8|same:password",
        ]);

        $data = Eotp::where("email", $request->get("email"))->first();

        if($data)
        {

            $password = Hash::make($request->get("password"));
            $check = User::where('email', $data->email)->update(['password' => $password]);

            Eotp::where("email", $request->get("email"))->delete();
            Alert::success('Done!', 'password has been changed successfully');
            return back();

        }
        else
        {
            Alert::error('Error!', 'Password reset failed!');
            return redirect("/");
        }
    }











}
