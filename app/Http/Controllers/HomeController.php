<?php

namespace App\Http\Controllers;

use App\Mail\AdminEmail;
use App\Mail\UserEmail;
use Stripe;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Reply;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Detailsform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{

public $email;
    public function index()
    {
        $product=Product::paginate(10);
        $comments=comment::orderby('id','desc')->get();
        $reply=reply::all();
       return view('home.userpage',compact('product','comments','reply'));
    }

   public function redirect(){
    $usertype=Auth::user()->usertype;

    if($usertype=='1'){

          $total_product=product::all()->count();

          $total_order=order::all()->count();

          $total_user=user::all()->count();

          $order=order::all();

          $total_revenue=0;

          foreach($order as $order){

            $total_revenue=$total_revenue + $order->price;
          }

          $total_delivered=order::where('delivery_status','=','delivered')->get()->count();

          $total_processing=order::where('delivery_status','=','processing')->get()->count();




          return view('admin.homelohinn',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));

    }
    else
    {

        $product=Product::paginate(10);
        $comments=comment::orderby('id','desc')->get();
        $reply=reply::all();
        return view('home.userpage',compact('product','comments','reply'));

    }
   }

   public function order_details($id)
   {
      $product=product::find($id);
      $comments = Comment::all();
      $reply = Reply::all();
      return view('home.order_details',compact('product','comments','reply'));
   }
   public function product_details($id)
   {
      $product=product::find($id);
      $comments = Comment::all();
      $reply = Reply::all();
      return view('home.product_details',compact('product','comments','reply'));
   }

   public function add_cart(Request $request,$id)
   {
    if(Auth::id()){
        $user=Auth::user();
        $userid=$user->id;
        $product=product::find($id);
        $product_exist_id=cart::where('Product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();
        if($product_exist_id){
            $cart=cart::find($product_exist_id)->first();
            $quantity=$cart->quantity;
            $cart->quantity=$quantity + $request->quantity;
            if($product->discount_price!=null){
                $cart->price=$product->discount_price  *  $cart->quantity;
            }else{
                $cart->price=$product->price  *  $cart->quantity;

            }
            $cart->save();



            Alert::success('Product Added Successfully','we have addeed product to the cart');

            return redirect()->route('buy');

        }else{
            $cart = new cart;
        $cart->name=$user->name;
        $cart->email=$user->email;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->user_id=$user->id;
        $cart->product_title=$product->title;

        if($product->discount_price!=null){
            $cart->price=$product->discount_price  *  $request->quantity;
        }else{
            $cart->price=$product->price  *  $request->quantity;

        }

        $cart->image=$product->image;
        $cart->product_id=$product->product_id;
        $cart->quantity=$request->quantity;
        $cart->save();

        Alert::success('Product Added Successfully','we have addeed product to the cart');
        return redirect()->route('buy');


        }

    }else{
        return redirect('login');

    }


   }

   public function show_cart()
   {
    if(Auth::id())
    {
        $id=Auth::user()->id;
      $cart = Cart::where('user_id','=',$id)->get();
      return view('home.show_cart',compact('cart'));

    }else{
        return redirect('login');
    }

   }

   public function byuknow()
   {
    if(Auth::id())
    {
        $id=Auth::user()->id;
      $cart = Cart::where('user_id','=',$id)->get();
      return view('home.buyknow',compact('cart'));

    }else{
        return redirect('login');
    }

   }

   public function detailsform()
   {
        return view('home.detailsform');


    }

    public function confirm(Request $request)
   {

    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
        'quantity' => 'required|numeric|min:1',
    ]);
    $user = new Detailsform();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->phone = $validatedData['phone'];
    $user->address = $validatedData['address'];
    $user->quantity = $validatedData['quantity'];
    $user->save();

    Mail::to('roseganapathy11@gmail.com')->send(new AdminEmail($user));
    Mail::to($user->email)->send(new UserEmail($user));

    return redirect()->route('cart')->with('success', 'Your order has been confirmed. Thank you!');

    }

        


//    public function remove_cart($id)
//    {
//     $cart=cart::find($id);
//     $cart->delete();
//     return redirect()->back()->with('message', 'Product Deleted Successfully');
//    }
public function remove_cart($id)
{
    $cart = Cart::find($id);

    if ($cart) {
        $cart->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    } else {
        return redirect()->back()->with('error', 'Product Not Found');
    }
}
public function cash_order()
{
    $user=Auth::user();
    $userid=$user->id;
    $data=cart::where('user_id','=',$userid)->get();

    foreach($data as $data){
        $order=new order;
        $order->name=$data->name;
        $order->email=$data->email;
        $order->phone=$data->phone;
        $order->address=$data->address;
        $order->user_id=$data->user_id;

        $order->product_title=$data->product_title;
        $order->price=$data->price;
        $order->quantity=$data->quantity;
        $order->image=$data->image;
        $order->product_id=$data->product_id;

        $order->payment_status='cash on delivery';
        $order->delivery_status='processing';

        $order->save();



        $cart_id=$data->id;

        $cart=cart::find($cart_id);
        $cart->delete();
    }

    return redirect()->back()->with('message','We have Received your Order. We will connect with soon...');

}


public function stripe($totalprice)
{
    return view('home.stripe',compact('totalprice'));
}


public function stripePost(Request $request)
{
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for Payment."
    ]);

    Session::flash('success', 'Payment successful!');

    return back();
}

public function show_order(){
    if(Auth::id()){
        $user=Auth::user();
        $userid=$user->id;
        $order=order::where('user_id','=',$userid)->get();
        return view('home.order',compact('order'));
    }else
    {
        return redirect('login');
    }
}

public function cancel_order($id){
    $order=order::find($id);
    $order->delivery_status='You canceled the order';
    $order->save();
    return redirect()->back();

}
public function add_comment(Request $request){
    if(Auth::id()){
        $comment=new comment;
        $comment->name=Auth::user()->name;
        $comment->user_id=Auth::user()->id;
        $comment->comment=$request->comment;
        $comment->save();
        return redirect()->back();

    }else{
        return redirect('login');
    }


}
 public function add_reply(Request $request){
    if(Auth::id()){
        $reply=new reply;
        $reply->name=Auth::user()->name;
        $reply->user_id=Auth::user()->id;
        $reply->comment_id=$request->commentId;
        $reply->reply=$request->reply;
        $reply->save();
        return redirect()->back();

    }else{
        return redirect('login');
    }
 }

 public function product_search(Request $request){
    $comments=comment::orderby('id','desc')->get();
    $reply=reply::all();
    $search_text=$request->search;
    $product=product::where('title','LIKE',"%$search_text%")->orWhere('catagory','LIKE',"%$search_text%")->paginate(10);
    return view('home.userpage',compact('product','comments','reply'));
 }

 public function product()
 {
    $product=Product::paginate(10);
        $comments=comment::orderby('id','desc')->get();
        $reply=reply::all();
    return view('home.all_product',compact('product','comments','reply'));
 }

 public function search_product(Request $request){
    $comments=comment::orderby('id','desc')->get();
    $reply=reply::all();
    $search_text=$request->search;
    $product=product::where('title','LIKE',"%$search_text%")->orWhere('catagory','LIKE',"%$search_text%")->paginate(10);
    return view('home.all_product',compact('product','comments','reply'));
 }

}
