<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\GodownStock;
use Illuminate\Support\Facades\File; //for delete image
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GodownStockController extends Controller
{
    public function index()
    {
        $stock =  DB::table('godown_stocks')
        ->join('categories', 'godown_stocks.category_id', 'categories.id')
        ->select("godown_stocks.*", "categories.category_name as category_name")
        ->latest()->paginate(10);
        return view("admin.GodownStock.index", compact("stock"));
    }

    public function add_godown_stoke()
    {
        $categories = Category::get();
        return view("admin.GodownStock.add_Stock", compact("categories"));
    }

    // ===================== store products ================== 
    public function store(Request $request)
    {

        $stoke = new GodownStock();

        if ($request->hasFile('image_godown')) {
            $file = $request->file('image_godown');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('img_DB/product/image_godown/', $filename);
            $stoke->image_godown = $filename;
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
        return Redirect('admin_godown_stock')->with('success', 'Product Added Successfully');
    }

    // ============== Seen =========== 
    public function godown_stock_seen($id)
    {
        //if findORFail use, do not show error
        $stock = GodownStock::findOrFail($id);
        return view('admin.GodownStock.godown_stock_seen', compact('stock'));
    }

    public function godown_stock_edit($id)
    {
        $stock = GodownStock::findOrFail($id);
        $categories = Category::get();
        return view('admin.GodownStock.edit_stock', compact('stock', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $stock = GodownStock::findOrFail($id);

        if ($request->hasFile('image_godown')) {
            $path = 'img_DB/product/image_godown/' . $stock->image;
            if (File::exists($path)) //avobe import class
            {
                File::delete($path);
            }
            $file = $request->file('image_godown');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('img_DB/product/image_godown/', $filename);
            $stock->image_godown = $filename;
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
        return Redirect('admin_godown_stock')->with('success', 'Product Updated Successfully');
    }

    public function Delete($id)
    {
        $stock = GodownStock::findOrFail($id);

        if ($stock->image_godown) {
            $path = 'img_DB/product/image_godown/' . $stock->image_godown;
            if (File::exists($path)) //avobe import class
            {
                File::delete($path);
            }
        }
        $stock->delete();
        return Redirect()->back()->with('delete', 'Product Successfully Deleted');
    }

    //searching product
    public function godown_stock_search(Request $request)
    {
        $stock =  DB::table('godown_stocks')
        ->join('categories', 'godown_stocks.category_id', 'categories.id')
        
            ->where('product_name', 'like', '%' . $request->search . '%')
            ->orWhere('brand', 'like', '%' . $request->search . '%')
            ->orWhere('product_quantity', 'like', '%' . $request->search . '%')
            ->orWhere('per_cost_price', 'like', '%' . $request->search . '%')
            ->orWhere('total_cost_price', 'like', '%' . $request->search . '%')
            ->orWhere('per_selling_price', 'like', '%' . $request->search . '%')
            
            ->orWhere('category_name', 'like', '%' . $request->search . '%')
            ->paginate(10);
        return view("admin.GodownStock.index", compact("stock"));
    }
}