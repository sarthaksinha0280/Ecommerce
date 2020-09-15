<?php

namespace App;

class Cart
{
    public $items;//['id'=>['quantity=>','price=>','data=>']];
    public $totalQuantity;
    public $totalPrice;

    /**
     * Cart constructor.
     */


    public function __construct($prevCart)
    {
        if($prevCart!=null){
         $this->items = $prevCart->items;
        // dump($this->items);
         $this->totalQuantity = $prevCart->totalQuantity;
          //dump($this->totalQuantity);

         $this->totalPrice = $prevCart->totalPrice;
          //dump($this->totalPrice);

        }
        else{
         $this->items = [];
         $this->totalQuantity = 0;
         $this->totalPrice = 0;
        }
    }

    public function addItem($id,$product){
        $price = (int) str_replace("$","",$product->price);
        
        //if item already_exists 
        if(array_key_exists($id,$this->items)){//if id and this->item have value then it rum otherwise not
            $productToAdd = $this->items[$id];
            $productToAdd['quantity']++;
            $productToAdd['totalSinglePrice'] =  $productToAdd['quantity'] * $price;
        }
        
        //add first time in the cart
        else{
            $productToAdd = ['quantity'=>1,'totalSinglePrice'=>$price,'data'=>$product];
        }
        $this->items[$id] = $productToAdd;
        $this->totalQuantity++;
        $this->totalPrice = $this->totalPrice + $price;
    }


    public function updatePriceAndQuantity(){
        $totalPrice=0;
        $totalQuantity=0;

        foreach($this->items as $item){
            $totalQuantity = $totalQuantity + $item['quantity'];
            $totalPrice = $totalPrice + $item['totalSinglePrice'];
        }

        $this->totalQuantity = $totalQuantity;
        $this->totalPrice = $totalPrice;
    }

}
