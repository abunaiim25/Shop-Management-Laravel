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
            ->latest()->paginate(20);
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

        $stoke->product_name = $request->product_name;
        $stoke->category_id = $request->category_id;
        $stoke->brand = $request->brand;
        $stoke->product_quantity = $request->product_quantity;
        $stoke->per_cost_price = $request->per_cost_price;
        //$stoke->total_cost_price = $request->product_quantity * $request->per_cost_price;
        $stoke->per_selling_price = $request->per_selling_price;

        $stoke->save();
        return Redirect('admin_godown_stock')->with('success', 'Product Added Successfully');
    }

    // ============== Seen =========== 
    // ============== Seen =========== 
    public function godown_stock_seen($id)
    {
        $stock = GodownStock::find($id);
        return response()->json([
            'status' => 200,
            'stock' => $stock,
        ]);
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

        $stock->product_name = $request->product_name;
        $stock->category_id = $request->category_id;
        $stock->brand = $request->brand;
        $stock->product_quantity = $request->product_quantity;
        $stock->per_cost_price = $request->per_cost_price;
        $stock->per_selling_price = $request->per_selling_price;

        $stock->save();
        return Redirect('admin_godown_stock')->with('success', 'Product Updated Successfully');
    }

    public function Delete($id)
    {
        $stock = GodownStock::findOrFail($id);
        /*delete
        if ($stock->image_godown) {
            $path = 'img_DB/product/image_godown/' . $stock->image_godown;
            if (File::exists($path)) //avobe import class
            {
                File::delete($path);
            }
        }
        */
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
            ->orWhere('per_selling_price', 'like', '%' . $request->search . '%')

            ->orWhere('category_name', 'like', '%' . $request->search . '%')
            ->paginate(20);
        return view("admin.GodownStock.index", compact("stock"));
    }

    public function godownstock_autocomplete_search_ajax()
    {
        $stock = GodownStock::get();
        $category = Category::get();
        $data = [];

        foreach ($stock as $item) {
            $data[] = $item['product_name'];
            $data[] = $item['brand'];
            $data[] = $item['product_quantity'];
            $data[] = $item['per_cost_price'];
            $data[] = $item['per_selling_price'];
        }
        foreach ($category as $item) {
            $data[] = $item['category_name'];
        }

        return $data;
    }
}
