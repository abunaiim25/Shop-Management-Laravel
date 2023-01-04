<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CombinedLedger;
use App\Models\LedgerCustomer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CombinedLedgerController extends Controller
{
    public function index()
    {
        /** LedgerCustomer all, CombinedLedger ar latest balance*/
        $customer = LedgerCustomer::addSelect(['latest_balance' => CombinedLedger::select('balance')->whereColumn('customerLedger_id', 'ledger_customers.id')->latest()->take(1)])
            ->orderBy('id', 'DESC')->paginate(20);
        return view("admin.CombinedLedger.index", compact('customer'));
    }

    // ============ store customer_ledger_store ========= 
    public function customer_ledger_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $customerLedger_id = LedgerCustomer::insertGetId([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);


        $request->validate([
            'date' => 'required',
            'balance' => 'required',
        ]);
        CombinedLedger::insert([
            'date' => $request->date,
            'customerLedger_id' => $customerLedger_id,
            'particulars' => "Openning Balance",
            'referance_no' => 'SE-' . (mt_rand(10000000, 99999999)),
            'balance' => $request->balance,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success', 'Combined Ledger Created');
    }

    // ============ Edit & Update customer_ledger_store ========= 
    public function customer_ledger_edit($id)
    {
        $customer = LedgerCustomer::find($id);
        return response()->json([
            'status' => 200,
            'customer' => $customer,
        ]);
    }

    public function customer_ledger_update(Request $request)
    {
        //find id
        $customerLedger_id = $request->input('customerLedger_id');
        $customer = LedgerCustomer::find($customerLedger_id);

        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->address = $request->input('address');
        $customer->update();

        return Redirect()->back()->with('success', 'Customer Information Updated');
    }

    //=======================Seen and Debit and Credit===============================
    public function admin_seen_ledger($id)
    {
        /** LedgerCustomer all, CombinedLedger ar latest balance*/
        $customer = LedgerCustomer::where('id', $id)
            ->addSelect(['latest_balance' => CombinedLedger::select('balance')->whereColumn('customerLedger_id', 'ledger_customers.id')->latest()->take(1)])->find($id);

        $ledger = CombinedLedger::where('customerLedger_id', $id)->get();

        //$debit = CombinedLedger::sum('debit');
        $debit = DB::table("combined_ledgers")->where('customerLedger_id', $id)->get()->sum(function ($item) {
            return $item->debit;
        });
        $credit = DB::table("combined_ledgers")->where('customerLedger_id', $id)->get()->sum(function ($item) {
            return $item->credit;
        });

        return view("admin.CombinedLedger.seen", compact('customer', 'ledger', 'debit', 'credit'));
    }

    // ============ store customer_ledger_store ========= 
    public function customer_ledger_debit(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'balance' => 'required',
            'debit' => 'required',
        ]);

        CombinedLedger::where('id', $id)->insert([
            'date' => $request->date,
            'customerLedger_id' => $request->customerLedger_id,
            'particulars' => "Debit",
            'referance_no' => 'SE-' . (mt_rand(10000000, 99999999)),
            'debit' => $request->debit,
            'balance' => $request->balance + $request->debit,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success', 'Debit Successfull');
    }

    // ============ store customer_ledger_store ========= 
    public function customer_ledger_credit(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'balance' => 'required',
            'credit' => 'required',
        ]);

        CombinedLedger::where('id', $id)->insert([
            'date' => $request->date,
            'customerLedger_id' => $request->customerLedger_id,
            'particulars' => "Credit",
            'referance_no' => 'SE-' . (mt_rand(10000000, 99999999)),
            'credit' => $request->credit,
            'balance' => $request->balance - $request->credit,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('delete', 'Credit Successfull');
    }

    //========================Delete===========
    public function customer_ledger_delete($id)
    {
        DB::table('ledger_customers')->where('id', $id)->delete();
        DB::table('combined_ledgers')->where('customerLedger_id', $id)->delete();
        return Redirect()->back()->with('delete', 'Customer & Ledger Deleted Successfully');
    }

    //searching product
    public function customer_ledger_search(Request $request)
    {
        $customer  = LedgerCustomer::addSelect(['latest_balance' => CombinedLedger::select('balance')->whereColumn('customerLedger_id', 'ledger_customers.id')->latest()->take(1)])
            ->where('name', 'like', '%' . $request->ledger_search . '%')
            ->orWhere('phone', 'like', '%' . $request->ledger_search . '%')
            ->orWhere('email', 'like', '%' . $request->ledger_search . '%')
            ->orWhere('address', 'like', '%' . $request->ledger_search . '%')
            ->paginate(20);
        return view("admin.CombinedLedger.index", compact('customer'));
    }
    
    public function ledger_autocomplete_search_ajax()
    {
        $customer = LedgerCustomer::get();
        $ledger =CombinedLedger::select('balance')->get();
        $data = [];

        foreach ($customer as $item) {
            $data[] = $item['name'];
            $data[] = $item['phone'];
            $data[] = $item['email'];
            $data[] = $item['address'];
        }
        foreach ($ledger as $item) {
            $data[] = $item['balance'];
        }
        
        return $data;
    }
}