<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        $user=User::where('usertype','user')->get()->count();
        $product=Product::all()->count();
        $order=Order::all()->count();
        $delivered=Order::where('status','Delivered')->get()->count();
        return view('admin.index',compact('user','product','order','delivered'));
    }
    public function shop()
    {
        if(Auth::id())
        {
            $user=Auth::user(); 
            $userid=$user->id;
            $count=Cart::where('user_id',$userid)->count();
        }
        else
        $count='';
        $product=Product::all();
        return view('home.shop',compact('product','count'));
    }  
    public function home()
    {
        if(Auth::id())
        {
            $user=Auth::user(); 
            $userid=$user->id;
            $count=Cart::where('user_id',$userid)->count();
        }
        else
        $count='';
        $product=Product::all();
        return view('home.index',compact('product','count'));
    }
    public function login_home()
    {
        $product=Product::all();
        if(Auth::id())
        {
            $user=Auth::user(); 
            $userid=$user->id;
            $count=Cart::where('user_id',$userid)->count();
        }
        else
        $count='';
        return view('home.index',compact('product','count'));
    } 

    public function product_details($id)
    {
        if(Auth::id())
        {
            $user=Auth::user(); 
            $userid=$user->id;
            $count=Cart::where('user_id',$userid)->count();
        }
        else
        $count='';
        $data=Product::find($id);
        return view('home.product_details',compact('data','count'));
    }
    
    public function add_cart($id)
    {
        $product_id=$id;
        $user=Auth::user(); 
        $user_id=$user->id;

        $data=new Cart;
        $data->user_id=$user_id;
        $data->product_id=$product_id;
        $data->save();
        toastr()->closeButton()->success('Product Added to the Cart Successfully.');
        
        return redirect()->back();
    }
    public function mycart()
    {
        if(Auth::id())
        {
            $user=Auth::user(); 
            $userid=$user->id;
            $count=Cart::where('user_id',$userid)->count();
            $cart=Cart::where('user_id',$userid)->get();
        }
        else
        $count='';
        return view('home.mycart',compact('count','cart'));
    }
    public function cart_delete($id) 
    {
        $data=Cart::find($id);
        $data->delete();
        toastr()->closeButton()->success('Category Deleted Successfully.');
        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $name=$request->name;
        $address=$request->address;
        $phone=$request->phone;
        $userid=Auth::user()->id;
        $cart=Cart::where('user_id',$userid)->get();

        foreach($cart as $carts)
        {
            $order=new Order;
            $order->name=$name;
            $order->rec_address=$address;
            $order->phone=$phone;
            $order->user_id=$userid;
            $order->product_id=$carts->product_id;
            $order->save();
        }
        $cart_remove=Cart::where('user_id',$userid)->get();
        foreach($cart_remove as $c1)
        {
            $data=Cart::find($c1->id);
            $data->delete();
        }
        toastr()->closeButton()->success('Order Placed Successfully.');
        return redirect()->back();
    }

    public function myorder()
    {
        $user=Auth::user()->id;
        $count=Cart::where('user_id',$user)->get()->count();
        $order=Order::where('user_id',$user)->get();
        return view('home.order',compact('count','order'));
    }
    
    public function stripe($value)
    {
        return view('home.stripe',compact('value'));
    }
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from complete." 
        ]);
        toastr()->closeButton()->success('Payment Made Successfully.');
        Session::flash('success', 'Payment successful!');
              
        return redirect('/mycart');
    }
}
