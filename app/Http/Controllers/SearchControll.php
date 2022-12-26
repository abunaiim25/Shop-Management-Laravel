<?php

namespace App\Http\Controllers;

use App\Models\ShopStock;
use Illuminate\Http\Request;

class SearchControll extends Controller
{
    public function product_list_ajax(){
        $product = ShopStock::select('product_name')->where('status', '1')->where('product_quantity', '>', 0)->get();
        $data = [];
        
        foreach ($product as $item){
            $data[] = $item['product_name'];
        }
        return $data;
    }
}