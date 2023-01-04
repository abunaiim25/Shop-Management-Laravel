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
            ->latest()->paginate(20);
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

        $stoke->product_name = $request->product_name;
        $stoke->category_id = $request->category_id;
        $stoke->brand = $request->brand;
        $stoke->product_quantity = $request->product_quantity;
        $stoke->product_quantity_total = $request->product_quantity;
        $stoke->per_cost_price = $request->per_cost_price;
        $stoke->per_selling_price = $request->per_selling_price;

        $stoke->save();
        return Redirect('admin_shop_stock')->with('success', 'Product Added Successfully');
    }

    // ============== addQty_stock Id =========== 
    public function addQty_stock($id)
    {
        $stock = ShopStock::find($id);
        return response()->json([
            'status' => 200,
            'stock' => $stock,
        ]);
    }

    // ============== addQty_stock Add =========== 
    public function addQty_stock_update(Request $request)
    {
        //find id
        $id = $request->input('id');
        $stock = ShopStock::find($id);
        $stock->product_quantity = $request->input('product_quantity_addQty') + $request->input('previous_product_quantity_addQty');
        $stock->product_quantity_total = $request->input('product_quantity_addQty') + $request->input('product_quantity_total_addQty');
        $stock->update();

        return Redirect()->back()->with('success', 'Product Quantity Updated');
    }

    // ============== Seen =========== 
    public function admin_shop_stock_seen($id)
    {
        $stock = ShopStock::find($id);
        return response()->json([
            'status' => 200,
            'stock' => $stock,
        ]);
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

        $stock->product_name = $request->product_name;
        $stock->category_id = $request->category_id;
        $stock->brand = $request->brand;
        $stock->per_cost_price = $request->per_cost_price;
        $stock->per_selling_price = $request->per_selling_price;

        $stock->save();
        return Redirect('admin_shop_stock')->with('success', 'Product Updated Successfully');
    }

    public function Delete($id)
    {
        $stock = ShopStock::findOrFail($id);
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
            ->orWhere('per_selling_price', 'like', '%' . $request->search . '%')

            ->orWhere('category_name', 'like', '%' . $request->search . '%')
            ->paginate(20);
        return view("admin.Stock.index", compact("stock"));
    }

    public function stock_autocomplete_search_ajax()
    {
        $stock = ShopStock::get();
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