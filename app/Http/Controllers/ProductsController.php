<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;   //this class is use when we use DB for retice data from the databases
use App\Product;//model
use App\Cart;//model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function index()
    {
       // $products = DB::table('products')->get();//this is using database method 
    
       //$products=DB::select('select * from products where id=:id',['id'=>2]);
    
     // $products=DB::table('products')->pluck('id');
        $products = Product::paginate(3);//all();//we fetch all data from database using model
       return view('allproducts',['items'=>$products]);
       //return view("allproducts",compact("products"));//we also pass variable on blade using compact
    }


    public function menproducts(){
        $products = DB::table('products')->where('type', 'men')->get();
       // dump($products);
       return view('menProducts',['items'=>$products]);
    }

    public function womenproducts(){
        $products = DB::table('products')->where('type', 'women')->get();
        //dump($products);
        return view('womenProducts',['items'=>$products]);
    }


    public function searchproducts(Request $request){
      $searchText =  $request->get('searchText');
      //$products = DB::table('products')->where('name',"Like",$searchText."%")->get();
      $products = Product::where('name',"Like",$searchText."%")->paginate(2);
      return view('allproducts',['items'=>$products]);

    }


    public function increaseSingleProduct(Request $request,$id){
     $prevCart  = $request->session()->get('cart');
     $cartt = new Cart($prevCart);
     $product = Product::find($id);
     $cartt->addItem($id,$product);
     $request->session()->put('cart', $cartt);

      return redirect()->route('cartproducts');   
     
    }


    public function decreaseSingleProduct(Request $request,$id){
     $prevCart  = $request->session()->get('cart');
     $cart = new Cart($prevCart);
     $product = Product::find($id);
     $price = (int) str_replace("$","",$product['price']);

    if($cart->items[$id]['quantity']>1){
         $cart->items[$id]['quantity'] = $cart->items[$id]['quantity']-1;
         $cart->items[$id]['totalSinglePrice']= $cart->items[$id]['quantity'] * $price;
         $cart->updatePriceAndQuantity();
         $request->session()->put('cart',$cart);
     }
     return redirect()->route("cartproducts");

    }





    

    public function addProductToCart(Request $request,$id){
     $prevCart  = $request->session()->get('cart'); //this card variable is same on line 37 cart //this is request session method
    // dump($prevCart);//at initially cart is null so $prevCart is also null
     $cartt = new Cart($prevCart);//obect of Cart class
     $product = Product::find($id);//this is similar as Product::all() but here we retrive only single attribute from database
     $cartt->addItem($id,$product);
     $request->session()->put('cart', $cartt);//value of cartt are save in the cart variable
     return redirect()->route('allproducts');   

    }



    public function showCart(){
       $cart = Session::get('cart');
      //cart is not empty
       if($cart){
           //dump($cart);
           return view('cartproducts',['cartItem'=>$cart]);

       }
       //cart is empty
       else{
          // echo("cart is empty");
          return redirect()->route('allproducts');

       }

    }

    public function deleteItemFromCart(Request $request,$id){
        $cart  = $request->session()->get("cart");

        if(array_key_exists($id,$cart->items)){
            unset($cart->items[$id]);
            $prevCart  = $request->session()->get("cart");
            $updatedCart = new Cart($prevCart);
            $updatedCart->updatePriceAndQuantity();

            $request->session()->put("cart",$updatedCart);


            return redirect()->route('cartproducts');


        }

    }





}
