<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * model name is always singular form of the table name
     */
    //protected $table = 'products'; //we use that if table is not plural of model name 
    protected $fillable = [
        'name','description', 'image','price','type'
    ];

    public function getPriceAttribute($value){
        $newForm = "$".$value;
        return $newForm;
    }

}
