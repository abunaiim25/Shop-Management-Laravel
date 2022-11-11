<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopStock extends Model
{
    use HasFactory;
    
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');//joined with category id
    }
}