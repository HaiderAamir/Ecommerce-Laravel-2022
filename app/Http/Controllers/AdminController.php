<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Order;
use App\Models\Corder;
use App\Models\Cart;
use App\Models\Subcat;
use App\Models\Slide;
use App\Mail\InprogressMail;
use App\Mail\DispatchMail;
use App\Mail\CompleteMail;
use App\Mail\DeclineMail;
use Mail;



use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use File;


class AdminController extends Controller
{
    public function rolecheck($role)
    {
        if($role=="editor")
        {
            return 1;
        }
        else if($role=="user")
        {
            return 0;
        }
    }

    public function active_user()
    {
        $data = User::where("role","!=",2)->where("role","!=",3)->get();
        return view("admin.active_user",["data"=>$data]);
    }

    public function add_user(Request $request)
    {

        $validator = $request->validate([
            "f_name"=>"required",
            "l_name"=>"required",
            "email"=>"required",
            "password"=>'min:6|required_with:cpassword|same:cpassword',
            "cpassword"=>"required|min:6",
            "dob"=>"required",
            "role"=>"required",
        ]);


            $data = new User;
            $data->f_name = $request->get("f_name");
            $data->l_name = $request->get("l_name");
            $data->email = $request->get("email");
            $data->password = bcrypt($request->get("password"));
            $data->role = $this->rolecheck($request->get("role"));
            $data->dob = $request->get("dob");


        if($data->save())
        {
            Alert::success('Congrats', 'You\'ve Successfully Registered');
            return back();
        }
        else
        {
            Alert::error('Error', 'Some Error Occured');
            return back();
        }
    }

    public function delete_user(Request $request)
    {
        $user_id = $request->validate(["user_id"=>"required"]);
        $data = User::where("id", $user_id)->first();
        $res = $data->delete();
        if($res)
        {
            Alert::success('User Deleted', 'User Deleted Successfully!');
            return back();
        }
        else
        {
            Alert::success('OOPS!', 'Some Error Occured');
            return back();
        }
    }

    public function update_user(Request $request)
    {
        // dd($request);
        $request->validate([
            "user_id"=>"required",
            "f_name"=>"required",
            "l_name"=>"required",
            "user_email"=>"required",
            "user_role"=>"required",
            "user_dob"=>"required",
        ]);

        $user = User::where("id",$request->get("user_id"))->first();
        $user->f_name = $request->get("f_name");
        $user->l_name = $request->get("l_name");
        $user->email = $request->get("user_email");
        $user->dob = $request->get("user_dob");
        $user->role = $this->rolecheck($request->get("user_role"));
        if($user->update())
        {
            Alert::success('User Updated', 'User Updated Successfully!');
            return back();
        }
        else
        {
            Alert::error('OOPS!', 'Some Error Occured!');
            return back();
        }

    }

    public function statuschange($id)
    {
        $data = User::where("id", $id)->first();
        if($data->status == 0)
        {
            $data->status = 1;
            $data->update();
            Alert::success('Success', 'User is now active');
            return back();
        }
        else if($data->status == 1)
        {
            $data->status = 0;
            $data->update();
            Alert::success('Success', 'User is now deactivate');
            return back();

        }
        else
        {
            Alert::error('OOPS!', 'User Not Found');
            return back();
        }

    }

    public function active_products()
    {
        $cat = Category::orderBy('id', 'DESC')->get();
        $subcat = Subcategory::orderBy('id', 'DESC')->get();
        $prod = Product::orderBy('id', 'DESC')->get();
        return view("admin.active_product", ["cat"=>$cat, "subcat"=>$subcat, "prod"=>$prod]);
    }

    public function add_subcategory(Request $request)
    {
        // dd($request);
        $data = new Subcategory;
        $request->validate(["s_category"=>"required", "pic"=>"required"]);

        $f1=$request->file('pic');
        $destinationPath = public_path('/subcategory');
        $t1 = $request->get("s_category").'.'.request()->pic->getClientOriginalExtension();
        $f1->move($destinationPath,$t1);

        $data->name = $request->get("s_category");
        $data->pic = $t1;

        if($data->save())
        {
            Alert::success('Congrates!', 'Sub category Added Successfully');
            return back();
        }
        else
        {
            Alert::error('OOPS!', 'Some error occurred.');
            return back();
        }  return back();
    }


    public function add_category(Request $request)
    {
        $data = new Category;
        $request->validate(["category"=>"required", "pic"=>"required"]);

        $f1=$request->file('pic');
        $destinationPath = public_path('/category');
        $t1 = $request->get("category").'.'.request()->pic->getClientOriginalExtension();
        $f1->move($destinationPath,$t1);

        $data->name = $request->get("category");
        $data->pic = $t1;

        if($data->save())
        {
            Alert::success('Congrates!', 'Registered Successfully!');
            return back();
        }
        else
        {
            Alert::error('OOPS!', 'Some error occurred.');
            return back();
        }
    }

    public function addproduct(Request $req)
    {
        $req->validate([
            "name"=>"required",
            "category"=>"required",
            "sub_category"=>"required",
            "p_price"=>"required",
            "s_price"=>"required",
            "qty"=>"required",
            "pic1"=>"required",
            "pic2"=>"required",
            "pic3"=>"required",
            "pic4"=>"required",
            "details"=>"required",
            "size"=>"required"
        ]);


        $data = new Product;

        $uid = Str::random(9);

        $f1=$req->file('pic1');
        $f2=$req->file('pic2');
        $f3=$req->file('pic3');
        $f4=$req->file('pic4');
        // $title = $req->get("name");

        $destinationPath = public_path('/products');

        $t1 = $uid.'1.'.request()->pic1->getClientOriginalExtension();
        $t2 = $uid.'2.'.request()->pic2->getClientOriginalExtension();
        $t3 = $uid.'3.'.request()->pic3->getClientOriginalExtension();
        $t4 = $uid.'4.'.request()->pic4->getClientOriginalExtension();

        $f1->move($destinationPath,$t1);
        $f2->move($destinationPath,$t2);
        $f3->move($destinationPath,$t3);
        $f4->move($destinationPath,$t4);


        $data->product_id = $uid;
        $data->name = $req->get("name");
        $data->category = $req->get("category");
        $data->sub_category = $req->get("sub_category");
        $data->price = $req->get("p_price");
        $data->details = $req->get("details");
        $data->sale_price = $req->get("s_price");
        $data->qty = $req->get("qty");
        $data->size = $req->get("size");
        $data->pic1 = $uid.'1';
        $data->pic2 = $uid.'2';
        $data->pic3 = $uid.'3';
        $data->pic4 = $uid.'4';

        if($data->save())
        {
            Alert::success('Congrates!', 'Product Added Successfully!');
            return back();
        }
        else
        {
            Alert::error('OOPS!', 'Some error occurred.');
            return back();
        }
    }

    public function sale_active($id)
    {
        $data = Product::where("id",$id)->first();
        if($data->sale_active == 0)
        {
            $data->sale_active = 1;
            $data->update();
            Alert::success('Success', 'Sale is active now');
            return back();
        }
        else if($data->sale_active == 1)
        {
            $data->sale_active = 0;
            $data->update();
            Alert::success('Success', 'Sale is now deactivate');
            return back();

        }
        else
        {
            Alert::error('OOPS!', 'User Not Found');
            return back();
        }
    }

    public function product_top($id)
    {
        $data = Product::where("id",$id)->first();
        if($data->top == 0)
        {
            $data->top = 1;
            $data->update();
            Alert::success('Success', 'Product is now in top list');
            return back();
        }
        else if($data->top == 1)
        {
            $data->top = 0;
            $data->update();
            Alert::success('Success', 'Product removed from top');
            return back();

        }
        else
        {
            Alert::error('OOPS!', 'User Not Found');
            return back();
        }
    }

    public function product_status($id)
    {
        $data = Product::where("id",$id)->first();
        if($data->status == 0)
        {
            $data->status = 1;
            $data->update();
            Alert::success('Success', 'Product is now active');
            return back();
        }
        else if($data->status == 1)
        {
            $data->status = 0;
            $data->update();
            Alert::success('Success', 'Product is now deactive');
            return back();

        }
        else
        {
            Alert::error('OOPS!', 'User Not Found');
            return back();
        }
    }

    public function delete_product(Request $req)
    {
        // dd($req);
        $data = Product::where("id",$req->get("prod_id"))->first();

        if(file_exists(public_path('/products/'.$data->pic1.'.png')))
        {
            unlink(public_path('/products/'.$data->pic1.'.png'));
            unlink(public_path('/products/'.$data->pic2.'.png'));
            unlink(public_path('/products/'.$data->pic3.'.png'));
            unlink(public_path('/products/'.$data->pic4.'.png'));

        }
        else
        {
            Alert::error('OOPS!', 'Some issue occured');
            return back();
        }
        $res = $data->delete();

        if($res)
        {
            Alert::success('Success', 'Product deleted');
            return back();
        }
        else
        {
            Alert::error('OOPS!', 'Some issue occured');
            return back();
        }
    }


    //orders area start
    public function new_orders()
    {

        $order = Order::all();
        return view("admin.new_orders", ["order"=>$order]);
    }

    public function complete_orders_list()
    {
        $order = Corder::all();
        return view("admin.new_orders", ["order"=>$order]);
    }


    public function customer_list()
    {
        $data = User::where("role", 3)->get();
        return view("admin.customer_list", ["data"=>$data]);
    }

    public function edit_product($id)
    {
        $data = Product::where("id", $id)->first();
        $cat = Category::all();
        $subcat = Subcategory::all();
        return view("admin.edit_product", ["data"=>$data, "cat"=>$cat, "subcat"=> $subcat]);
    }

    public function slides()
    {
        $data = Slide::all();
        $prodlist = Product::all();
        return view("admin.slider", ["data"=>$data, "prodlist"=>$prodlist]);
    }


    public function addslide(Request $req)
    {

        $req->validate([
            "title1"=>"title1",
            "title2"=>"required",
            "caption"=>"required",
            "prod_id" =>"required",
            "slide_image" => "required"
        ]);
        $uid = Str::random(9);

        $f1=$req->file('slide_image');

        $destinationPath = public_path('/slides');

        $t1 = $uid.'1.'.request()->slide_image->getClientOriginalExtension();

        $f1->move($destinationPath,$t1);

        $data = new Slide;
        $data->title1 = $req->get("title1");
        $data->title2 = $req->get("title2");
        $data->caption = $req->get("caption");
        $data->prod_id = $req->get("prod_id");
        $data->image = $uid.'1';

        if($data->save())
        {
            Alert::success('Success', 'Slide Addess!');
            return back();
        }
        else
        {
            Alert::error('OOPS!', 'Some issue occured');
            return back();
        }
    }

    public function delete_slide(Request $req)
    {
        $res = Slide::where("id", $req->get("slide_id"))->first();
        if($res->delete())
        {
            Alert::success('Success', 'Slide Deleted!');
            return back();
        }
        else
        {
            Alert::error('OOPS!', 'Some issue occured');
            return back();
        }
    }

    public function update_order_status(Request $request)
    {
    $orderId = $request->input('orderId');
    $status = $request->input('status');

    $order = Order::where("id", $orderId)->first();
    Order::where('invoice_number', $order->invoice_number)->update(['status' => $status]);


    if($status == 0)
    {
        $details = [
            'name' => $order->customer_name,
            'invoice_number' => $order->invoice_number,
            'email' => $order->customer_email,
        ];
        Mail::to($order->customer_email)->send(new InprogressMail($details));

    }
    else if($status == 1)
    {
        $details = [
            'name' => $order->customer_name,
            'invoice_number' => $order->invoice_number,
            'email' => $order->customer_email,
        ];
        Mail::to($order->customer_email)->send(new DispatchMail($details));

    }
    else if($status == 2)
    {
        $details = [
            'name' => $order->customer_name,
            'invoice_number' => $order->invoice_number,
            'email' => $order->customer_email,
        ];
        Mail::to($order->customer_email)->send(new CompleteMail($details));
        $data = Order::where('invoice_number', $order->invoice_number)->get();
        foreach ($data as $data)
        {
            $order = new Corder;
            $order->customer_id = $data->customer_id;
            $order->customer_email = $data->customer_email;
            $order->customer_name = $data->customer_name;
            $order->payment_method = $data->payment_method;
            $order->product_id = $data->product_id;
            $order->product_name = $data->product_name;
            $order->product_qty = $data->product_qty;
            $order->product_price = $data->product_price;
            $order->address = $data->address;
            $order->invoice_number = $data->invoice_number;
            $order->status = 1;
            $order->save();
            $data->delete();
        }
        $response = "ok";
        return $response;
    }
    else if($status == 3)
    {
        $details = [
            'name' => $order->customer_name,
            'invoice_number' => $order->invoice_number,
            'email' => $order->customer_email,
        ];
        Mail::to($order->customer_email)->send(new DeclineMail($details));
        $data = Order::where('invoice_number', $order->invoice_number)->delete();
        $response = "ok";
        return $response;
    }

    return response()->json(['status' => 'success']);
    }



    public function catgories()
    {
        $data = Category::all();
        return view("admin.category", ["data"=>$data]);
    }

    public function sub_catgories()
    {
        $data1 = Subcategory::all();
        return view("admin.sub_category", ["data1"=>$data1]);
    }

    public function delete_category(Request $req)
    {
        $req->validate([
            "data_id" => "required"
        ]);

        $res = Category::where("id", $req->get("data_id"))->delete();

        if($res)
        {
            Alert::success('Success', 'Category Deleted Successfully!');
            return back();
        }
        else
        {
            Alert::error('OOPS!', 'Some issue occured while deleting category');
            return back();
        }
    }

    public function delete_sub_category(Request $req)
    {
        $req->validate([
            "data_id" => "required"
        ]);
        $res = Subcategory::where("id", $req->get("data_id"))->delete();
        if($res)
        {
            Alert::success('Success', 'Subcategory Deleted Successfully!');
            return back();
        }
        else
        {
            Alert::error('OOPS!', 'Some issue occured while deleting Subcategory');
            return back();
        }
    }

    public function product_details_fetch($prod)
    {
        $data = Product::where("id", $prod)->first();
        
        return response()->json($data);
        
    }

    public function update_product(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "category"=>"required",
            "sub_category"=>"required",
            "p_price"=>"required",
            "s_price"=>"required",
            "qty"=>"required",
            "size"=>"required",
            "details"=>"required",
        ]);

        $prod = Product::findOrFail($request->get("id"));


        // update the blog post with the new data from the request
        $prod->name = $request->get('name');
        $prod->category = $request->get('category');
        $prod->sub_category = $request->get('sub_category');
        $prod->price = $request->get('p_price');
        $prod->sale_price = $request->get('s_price');
        $prod->qty = $request->get('qty');
        $prod->size = $request->get('size');
        $prod->details = $request->get('details');
        

        if($prod->save())
        {
            Alert::success('Success', 'product update Successfully!');
            return back();
        }
        else
        {
            Alert::error('OOPS!', 'Some issue occured while updated product');
            return back();
        }
    }









}
