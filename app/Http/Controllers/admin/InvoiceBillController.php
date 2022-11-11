<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerInformation;
use App\Models\InvoiceBill;
use App\Models\InvoiceBillItem;
use App\Models\ProductInvoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceBillController extends Controller
{
    public function index()
    {
        //$invoice_bill = DB::table('customer_information')->join('invoice_bills', 'customer_information.order_id', 'invoice_bills.id')->get();
        //or
        $invoice_bill = DB::table('invoice_bills')
            ->join('customer_information', 'invoice_bills.id', 'customer_information.order_id') //join
            ->select("invoice_bills.*", "customer_information.name as name", "customer_information.date as date") //if same column in a table
            ->orderBy('invoice_bills.id', 'DESC')->paginate(10);
        //dd($invoice_bill);
        return view("admin.InvoiceBill.index", compact('invoice_bill'));
    }

    //========================PDF Seen============================
    public function seen_invoicebill($id)
    {
        //$invoice=InvoiceBill::find($id);
        $invoice = DB::table('invoice_bills')->where('invoice_bills.id', $id)
            ->join('customer_information', 'invoice_bills.id', 'customer_information.order_id') //join
            ->first();

        $product = DB::table('invoice_bill_items')->where('order_id', $id)->get();

        return view("admin.InvoiceBill.seen_invoicebill", compact('invoice', 'product'));
    }

    //====================ADD Invoice Page=====================
    public function admin_add_invoice()
    {
        $product_invoice = ProductInvoice::where('user_ip', request()->ip())->latest()->get();
        $subtotal = ProductInvoice::all()->where('user_ip', request()->ip())->sum(function ($t) {
            return $t->price * $t->qty;
        });
        return view("admin.InvoiceBill.add_invoice", compact('product_invoice', 'subtotal'));
    }

    //======================product_invoice_store======================
    public function product_invoice_store(Request $request)
    {
        $request->validate([
            'qty' => 'integer',
            'price' => 'integer',
            'warranty' => 'integer',
        ]);

        ProductInvoice::insert([
            'product_desc' => $request->product_desc,
            'warranty' => $request->warranty,
            'qty' => $request->qty,
            'price' => $request->price,
            'user_ip' => request()->ip(),
        ]);
        return Redirect()->back();
    }
    //======================admin_product_invoice_delete======================
    public function admin_product_invoice_delete($id)
    {
        $item = ProductInvoice::findOrFail($id);
        $item->delete();
        return Redirect()->back()->with('delete', 'Product Successfully Deleted');
    }


    //=====================place_order_invoice======================
    public function place_order_invoice(Request $request)
    {
        $order_id = InvoiceBill::insertGetId([
            'invoice_no' => 'SHOPNO-' . (mt_rand(10000000, 99999999)),
            'previous_due' => $request->previous_due,
            'subtotal' => $request->subtotal,
            'collecton' => $request->collecton,
            'created_at' => Carbon::now(),
        ]);


        $product_invoices = ProductInvoice::where('user_ip', request()->ip())->latest()->get();
        foreach ($product_invoices as $product) {
            InvoiceBillItem::insert([
                'order_id' => $order_id,
                'product_desc' => $product->product_desc,
                'warranty' => $product->warranty,
                'price' => $product->price,
                'product_qty' => $product->qty,
                'created_at' => Carbon::now(),
            ]);
        }

        CustomerInformation::insert([
            'order_id' => $order_id,
            'name' => $request->name,
            'date' => $request->date,
            'person' => $request->person,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'ref_by' => $request->ref_by,
            'sold_by' => $request->sold_by,
            'created_at' => Carbon::now(),
        ]);

        //delete from cart
        ProductInvoice::where('user_ip', request()->ip())->delete();
        return Redirect()->to('/admin_invoice_bill')->with('status', 'Invoice/Bill added Successfully');
    }

    //====================place_order_invoice_delete==========================
    public function place_order_invoice_delete($id)
    {

        DB::table('invoice_bills')->where('invoice_bills.id', $id)->delete();
        DB::table('customer_information')->where('customer_information.id', $id)->delete();
        DB::table('invoice_bill_items')->where('invoice_bill_items.order_id', $id)->delete();

        return Redirect()->back()->with('delete', 'Invoice/Bill Successfully Deleted');
    }

    public function admin_place_order_invoice_edit($id)
    {
        $invoice = InvoiceBill::find($id);
        $product  = DB::table('invoice_bill_items')->where('order_id', $id)->get();
        $customer_information = DB::table('customer_information')->where('order_id', $id)->first();
        $subtotal = DB::table("invoice_bill_items")->where('order_id', $id)->get()->sum(function ($item) {
            return $item->price * $item->product_qty;
        });
        return view("admin.InvoiceBill.edit_invoice", compact('invoice', 'product', 'customer_information', 'subtotal'));
    }

    //===========================Update Multiple table===================================
    public function place_order_invoice_updated(Request $request, $id)
    {
        $subtotal = DB::table("invoice_bill_items")->where('order_id', $id)->get()->sum(function ($item) {
            return $item->price * $item->product_qty;
        });
      
        InvoiceBill::where('id', $id)->update([
            'previous_due' => $request->previous_due,
            'subtotal' => $subtotal,
            'collecton' => $request->collecton,
            'updated_at' => Carbon::now(),
        ]);

        //===============InvoiceBillItem================
        foreach ($request->prodId as $key => $value) {
            $data = array(                 
                'product_desc'=>$request->product_desc[$key],
                'warranty'=>$request->warranty[$key],  
                'price'=>$request->price[$key],
                'product_qty'=>$request->product_qty[$key],                   
            );         
            InvoiceBillItem::where('id',$request->prodId[$key])
            ->update($data); 
      }
      
        //===============CustomerInformation================
        CustomerInformation::where('order_id', $id)->update([
            'name' => $request->name,
            'date' => $request->date,
            'person' => $request->person,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'ref_by' => $request->ref_by,
            'sold_by' => $request->sold_by,
            'updated_at' => Carbon::now(),
        ]);

        return Redirect()->to('/admin_invoice_bill')->with('status', 'Invoice/Bill updated Successfully');
    }
}