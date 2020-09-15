<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});






  
    // Route::get('products', ["uses"=>"ProductsController@index","as"=>"allproducts"]);
    Route::get('products','ProductsController@index')->name('allproducts');
  
    //for men product
    Route::get('products/men', ["uses"=>"ProductsController@menproducts","as"=>"menproducts"]);
  
    // for women product
    Route::get('products/women', ["uses"=>"ProductsController@womenproducts","as"=>"womenproducts"]);

    //search product
    Route::get('search', ["uses"=>"ProductsController@searchproducts","as"=>"searchproducts"]);
   
   
   
    //Route::get('product/addToCart/{id}',['uses'=>'ProductsController@addProductToCart','as'=>'AddToCartProduct']);
    Route::get('products/addToCart/{id}','ProductsController@addProductToCart')->name('AddToCartProduct');
    
    
    
    //for the cart
    Route::get('cart', ["uses"=>"ProductsController@showCart","as"=>"cartproducts"]);
    
    
    //for delete from the cart
    Route::get('product/deleteItemFromCart/{id}', ["uses"=>"ProductsController@deleteItemFromCart","as"=>"DeleteItemFromCart"]);


    //increase product cart 
    Route::get('product/increaseSingleProduct/{id}', ["uses"=>"ProductsController@increaseSingleProduct","as"=>"IncreaseSingleProduct"]);



   //decrease product cart 
    Route::get('product/decreaseSingleProduct/{id}', ["uses"=>"ProductsController@decreaseSingleProduct","as"=>"DecreaseSingleProduct"]);





    


    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

    //admin panel
    Route::get('admin/products', ["uses"=>"Admin\AdminProductsController@index","as"=>"adminDisplayProducts"])->middleware('restrictToAdmin');
    
    
    
    //display edit product from
    Route::get('admin/editProductForm/{id}', ["uses"=>"Admin\AdminProductsController@editProductForm","as"=>"adminEditProductForm"]);
    //diplay edit product Image form
    Route::get('admin/editProductImageForm/{id}', ["uses"=>"Admin\AdminProductsController@editProductImageForm","as"=>"adminEditProductImageForm"]);
    
    //update image 
    Route::post('admin/updateProductImage/{id}', ["uses"=>"Admin\AdminProductsController@updateProductImage","as"=>"adminUpdateProductImage"]);
    //update product data
    Route::post('admin/updateProductFrom/{id}',["uses"=>"Admin\AdminProductsController@updateProductFrom","as"=>"adminUpdateProductForm"]);
     //delete product data

     Route::get('admin/deleteProduct/{id}',["uses"=>"Admin\AdminProductsController@deleteProduct","as"=>"adminDeleteProduct"]);  
     
     //create product form

     Route::get('admin/createProductForm',["uses"=>"Admin\AdminProductsController@createProductForm","as"=>"adminCreateProductForm"]); 


     //enter new product data
    Route::post('admin/sendCreateProductFormm/',["uses"=>"Admin\AdminProductsController@sendCreateProductForm","as"=>"adminSendCreateProductForm"]);

    


