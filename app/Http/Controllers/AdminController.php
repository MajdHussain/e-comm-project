<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\user;
use Session;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    function index(Request $req)
    {
        if($req->session()->has('admin')){
        $data= Product::all();

        return view('adminPage',['Product'=>$data]);
        }
        else{
            return redirect('/login');
        }
    }
    function create(Request $req)
    {
        if($req->session()->has('admin')){
        $product = new product;
        $product->name = $req->name;
        $product->price = $req->price;
        $product->main_categories = $req->main_categories;
        $product->category = $req->category;
        $product->description = $req->description;
        $product->gallery = $req->gallery;
        $product->save();
        return redirect('/adminPage');
        }
        else{
            return redirect('/login');
        }
    }
    function detail(Request $req ,$id)
    {
        if($req->session()->has('admin')){
        $data = Product::find($id);
        return View('detailAdmin',['Product'=>$data]);
        }
        else{
            return redirect('/login');
        }
    }
    function updateItem(Request $req){
        if($req->session()->has('admin')){
        $update = DB::table('products')
        ->where('id', $req->product_id)
        ->update(['name' => $req->name,
        'price' => $req->price ,
        'main_categories' => $req->main_categories ,
        'category' => $req->category ,
        'description' => $req->description ,
        'gallery' => $req->gallery]);
        return redirect('/adminPage');
        }
        else{
            return redirect('/login');
        }
    }
    function delete(Request $req ,$id){
        if($req->session()->has('admin')){
        Product::destroy($id);
        return redirect('/adminPage');
        }
        else{
            return redirect('/login');
        }
    }
    function adminOrders(Request $req, $id){
        if($req->session()->has('admin')){
   

        $orders = DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$id)
        ->get();
        

        return view('adminorders',['orders'=>$orders]);
        }
        else{
            return redirect('/login');
        }
    }
    function updateStatus(Request $req){
        if($req->session()->has('admin')){
        $update = DB::table('orders')
        ->where('user_id', $req->user_id)
        ->update(['status' => $req->status]);
        return redirect('/adminPage');
        }
        else{
            return redirect('/login');
        }
    }
    function showUsers(Request $req){
        if($req->session()->has('admin')){
        $data= DB::table('users')
        ->select('id','name' ,'email' ,'is_banned')
        ->WHERENOT("email", 'admin@edraakmc.com')
        ->get();

        return view('users',['user'=>$data]);
        }
        else{
            return redirect('/login');
        }
    }
    function ban(Request $req){
        if($req->session()->has('admin')){
        $update = DB::table('users')
        ->where('id', $req->user_id)
        ->update(['is_banned' => true]);
        return redirect('/adminPage');
        }
        else{
            return redirect('/login');
        }

    }
    function unBan(Request $req){
        if($req->session()->has('admin')){
        $update = DB::table('users')
        ->where('id', $req->user_id)
        ->update(['is_banned' => false]);
        return redirect('/adminPage');
        }
        else{
            return redirect('/login');
        }
    }
    function searchUsers(Request $req)
    {
        if($req->session()->has('admin')){
        if($req->input('userS') == 'id'){
        $data = user::where('id', 'like', '%'.$req->input('query').'%')
        ->get();
        return View('userssearch',['user'=>$data]);
        }
        else{
            $data = user::where('name', 'like', '%'.$req->input('query').'%')
            ->get();
            return View('userssearch',['user'=>$data]);
        }
    }else{
        return redirect('/login');
    }
        
    }
    function pagesN(Request $req, $id){
        if($req->session()->has('admin')){
        $data= Product::all();
        

        return view('Apage',['Product'=>$data],['id'=>$id]);
        }
        else{
            return redirect('/login');
        }
    }
    function search(Request $req)
    {
        if($req->session()->has('admin')){
        $data = Product::where('name', 'like', '%'.$req->input('query').'%')
        ->get();
        return View('adminsearch',['Product'=>$data]);
        }
        else{
            return redirect('/login');
        }
    }
    function ordersfilter()
    {
        if($req->session()->has('admin')){
        $data= DB::table('orders')->distinct()->get(['user_id']);
        return view('ordersF',['users'=>$data]);
        }else{
            return redirect('/login');
        }
    }
    function sOrders(Request $req)
    {
        if($req->session()->has('admin')){
        $data= DB::table('orders')
        ->where('user_id', $req['query'])
        ->distinct()
        ->get(['user_id']);
        return view('ordersS',['users'=>$data]);
        }
        else{
            return redirect('/login');
        }
    }
}

