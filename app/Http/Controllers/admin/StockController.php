<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ShopStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; //for delete image

class StockController extends Controller
{
    public function index()
    {
        $stock = DB::table('shop_stocks')
        ->join('categories', 'shop_stocks.category_id', 'categories.id')
        ->select("shop_stocks.*", "categories.category_name as category_name")
        ->latest()->paginate(10);
        return view("admin.Stock.index", compact("stock"));
    }

    public function add_stoke_page()
    {
        $categories = Category::get();
        return view("admin.Stock.add_Stock", compact("categories"));
    }

    // ===================== store products ================== 
    public function store(Request $request)
    {

        $stoke = new ShopStock();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('img_DB/product/image/', $filename);
            $stoke->image = $filename;
        }

        $stoke->product_name = $request->product_name;
        $stoke->category_id = $request->category_id;
        $stoke->brand = $request->brand;
        $stoke->product_quantity = $request->product_quantity;
        $stoke->description = $request->description;
        $stoke->per_cost_price = $request->per_cost_price;
        $stoke->total_cost_price = $request->total_cost_price;
        $stoke->per_selling_price = $request->per_selling_price;

        $stoke->save();
        return Redirect('admin_shop_stock')->with('success', 'Product Added Successfully');
    }

    // ============== Seen =========== 
    public function admin_shop_stock_seen($id)
    {
        //if findORFail use, do not show error
        $stock = ShopStock::findOrFail($id);
        return view('admin.Stock.shop_stock_seen', compact('stock'));
    }

    public function admin_shop_stock_edit($id)
    {
        $stock = ShopStock::findOrFail($id);
        $categories = Category::get();
        return view('admin.Stock.edit_stock', compact('stock', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $stock = ShopStock::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = 'img_DB/product/image/' . $stock->image;
            if (File::exists($path)) //avobe import class
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('img_DB/product/image/', $filename);
            $stock->image = $filename;
        }

        $stock->product_name = $request->product_name;
        $stock->category_id = $request->category_id;
        $stock->brand = $request->brand;
        $stock->product_quantity = $request->product_quantity;
        $stock->description = $request->description;
        $stock->per_cost_price = $request->per_cost_price;
        $stock->total_cost_price = $request->total_cost_price;
        $stock->per_selling_price = $request->per_selling_price;

        $stock->save();
        return Redirect('admin_shop_stock')->with('success', 'Product Updated Successfully');
    }

    public function Delete($id)
    {
        $stock = ShopStock::findOrFail($id);

        if ($stock->image) {
            $path = 'img_DB/product/image/' . $stock->image;
            if (File::exists($path)) //avobe import class
            {
                File::delete($path);
            }
        }
        $stock->delete();
        return Redirect()->back()->with('delete', 'Product Successfully Deleted');
    }

    //searching product
    public function shop_stock_search(Request $request)
    {
        $stock = DB::table('shop_stocks')
            ->join('categories', 'shop_stocks.category_id', 'categories.id') 
            //->select("shop_stocks.*", "categories.category_name as category_name")
            ->where('product_name', 'like', '%' . $request->search . '%')
            ->orWhere('brand', 'like', '%' . $request->search . '%')
            ->orWhere('product_quantity', 'like', '%' . $request->search . '%')
            ->orWhere('per_cost_price', 'like', '%' . $request->search . '%')
            ->orWhere('total_cost_price', 'like', '%' . $request->search . '%')
            ->orWhere('per_selling_price', 'like', '%' . $request->search . '%')
            
            ->orWhere('category_name', 'like', '%' . $request->search . '%')
            ->paginate(10);
        return view("admin.Stock.index", compact("stock"));
    }
} 