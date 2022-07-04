<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    //
    function index()
    {
        $data= Product::all();

        return view('product',['Product'=>$data]);
    }

    function filter()
    {
        $data= DB::table('products')->distinct()->get(['main_categories']);
        return view('filter',['Product'=>$data]);
    }


    function detail($id)
    {
        $data = Product::find($id);
        return View('detail',['Product'=>$data]);
    }
    function search(Request $req)
    {
        $data = Product::where('name', 'like', '%'.$req->input('query').'%')
        ->get();
        return View('search',['Product'=>$data]);
    }


    function searchFilter(Request $req){

        switch ($req->sortby) {
            case "Latest":
                $data = Product::where('name', 'like', '%'.$req->input('query').'%')->
                where('main_categories','like', $req->input('mainCat'))->
                where('category','like', $req->input('subCat'))
                ->orderBy('id', 'DESC')
                ->get();
                return View('searchF',['Product'=>$data]);
              break;
            case "a-z":
                $data = Product::where('name', 'like', '%'.$req->input('query').'%')->
                where('main_categories','like', $req->input('mainCat'))->
                where('category','like', $req->input('subCat'))
                ->orderBy('id', 'DESC')
                ->get();
                return View('searchF',['Product'=>$data]);
              break;
            case "Price-h-l":
                $data = Product::where('name', 'like', '%'.$req->input('query').'%')->
                where('main_categories','like', $req->input('mainCat'))->
                where('category','like', $req->input('subCat'))
                ->orderBy('price','ASC')
                ->get();
                return View('searchF',['Product'=>$data]);
              break;

            case "Price-l-h":
                $data = Product::where('name', 'like', '%'.$req->input('query').'%')->
                where('main_categories','like', $req->input('mainCat'))->
                where('category','like', $req->input('subCat'))
                ->orderBy('price', 'DESC')
                ->get();
                return View('searchF',['Product'=>$data]);
              break;

            default:
            $data = Product::where('name', 'like', '%'.$req->input('query').'%')->
            where('main_categories','like', $req->input('mainCat'))->
            where('category','like', $req->input('subCat'))
            ->get();
            return View('searchF',['Product'=>$data]);
          }
          


    }


    function addToCart(Request $req){
        if($req->session()->has('user')){
            $cart = new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->size=$req->size;
            $cart->quantity=$req->quantity;
            $cart->save();
            return redirect('/');
        }
        else{
            return redirect('/login');
        }
    }
    static function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    function cartList(Request $req){
        if($req->session()->has('user')){
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->Join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id', 'cart.size as size', 'cart.quantity as quantity')
        ->get();
        

        return view('cartlist',['products'=>$products]);
        }
        else{
            return redirect('/login');
        }
    }
    function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');

    }
    function orderNow(){
        $userId = Session::get('user')['id'];
        $total= $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');

        return view('ordernow',['total'=>$total]);
    }
    function orderPlace(Request $req){

        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id',$userId)->get();
        foreach($allCart as $cart){
            $order= new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "Processing";
            $order->address2 = $req->address2;
            $order->city = $req->City;
            $order->state = $req->State;
            $order->country = $req->country;
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            $order->address = $req->address;
            $order->size = $cart['size'];
            $order->quantity = $cart['quantity'];
            $order->save();
            Cart::where('user_id',$userId)->delete();
        }
        $req->input();
        return redirect('/');
    }
    function myOrders(Request $req){
        if($req->session()->has('user')){
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();

        return view('myorders',['orders'=>$orders]);
        }else{
            return redirect('/login');
        }
        
    }
    function pagesN(Request $req, $id){
        
        $data= Product::all();
        return view('page',['Product'=>$data],['id'=>$id]);
        
    }

    
}
