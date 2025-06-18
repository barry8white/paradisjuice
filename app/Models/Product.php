<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category',
        'produit',
        'price',
        'file_path'
    ];

    public function items(){
        return $this->hasMany(Item::class);
    }
}
