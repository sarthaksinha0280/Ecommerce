<?php
namespace App\Http\Controllers\Admin;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminProductsController extends Controller
{    
    
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////     
    //display all products
   public  function index(){
    $products = Product::paginate(3);//all();
    return view('admin.displayProducts',['items'=>$products]);
   }
    
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////  
   
   //display edit product
   public function editProductForm($id){
       $product=Product::find($id);
       return view('admin.editProductForm',['product'=>$product]);
        
    }
    
    
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////     
    
    //display edit product image form
    public function editProductImageForm($id){
        $product=Product::find($id);
        return view('admin.editProductImageForm',['product'=>$product]);  

    }
    
   
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////  

   
    public function updateProductImage(Request $request,$id ){ 
     
       Validator::make($request->all(),['image'=>"required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate();
       
      if($request->hasFile('image')){
          $product=Product::find($id);
         $exists = Storage::disk('local')->exists("public/product_images/".$product->image);
         //delete old image
         if($exists){
             Storage::delete('public/product_image/'.$product->image);
         }
         //upload new image
        $ext = $request->file('image');
       
        $uniqueFileName = uniqid() . $ext->getClientOriginalName() . '.' . $ext->getClientOriginalExtension();
        $request->image->storeAs("public/product_images/",$product->image);
        $arrayToUpdate = array('image'=>$product->image);
        DB::table('products')->where('id',$id)->update($arrayToUpdate);

        return redirect()->route("adminDisplayProducts");
      }

      else
      {
          $error = "NO Image was Selected";
          return $error;

      }
        
    }


   ////////////////////////////////////////////////////////////////////////////////////////////////////////////  

    public function updateProductFrom(Request $request,$id){
    $price =  $request->input('price');
     $price = (int) str_replace("$","",$price);
    // dump($price);
     $name = $request->input('name');
     $description = $request->input('description');
     $type = $request->input('type');
     DB::table('products')->where('id',$id)->update(['name' => $name,'description'=>$description,'type'=>$type,'price'=>$price]);
     return redirect()->route("adminDisplayProducts");
    }
    
     ////////////////////////////////////////////////////////////////////////////////////////////////////////////  
  
  
    public function deleteProduct(Request $request,$id){

        $product = Product::find($id);
        $exists = Storage::disk('local')->exists('public/product_images/'.$product->image);
        //dd($exists);
         if($exists)
         {
             Storage::disk('local')->delete('public/product_images/'.$product->image);
         }
         Product::destroy($id);
         return redirect()->route("adminDisplayProducts");
    }

 
     ////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 
    public function createProductForm(){
       return view("admin.createProductForm");
   }

   
   ////////////////////////////////////////////////////////////////////////////////////////////////////////////  
  
  
   public function sendCreateProductForm(Request $request){

       $name = $request->input('name');
       $description = $request->input('description');
       $type = $request->input('type');
       $price = $request->input('price');

    //for the send image in the database 
     Validator::make($request->all(),['image'=>"required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate();//by using ->validate() it work as the ajax
    $ext = $request->file('image');
    $uniqueFileName=$ext->getClientOriginalExtension();
    
    $stringImageReFormat = str_replace(" ","",$request->input('name'));//this is used to replace the original name of the image to name 
    
     $imageName = $stringImageReFormat.".".$uniqueFileName;//add the extension in the image name

     $imageEncode = File::get($request->image);
       
      Storage::disk('local')->put('public/product_images/'.$imageName,$imageEncode);//
      $newProductArray = array("name" => $name,"description"=>$description,"image"=>$imageName,"type"=>$type,"price"=>$price);
      $create = DB::table("products")->insert($newProductArray);

      if($create){
       return redirect()->route("adminDisplayProducts");
       }
       else{
           return "Product was not Created";
       }
   }

}
