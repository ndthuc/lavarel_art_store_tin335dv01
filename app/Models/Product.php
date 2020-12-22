<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'description', 'image', 'price', 'creation_date', 'include_VAT', 'quantity', 'category_id' ];
    public function orders(){
        return $this->belongsToMany('Orders');
    }
}
