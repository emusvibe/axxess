<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('admin.invoices.index', compact('invoices'));
    }

    public function store(Request $request)
    {
        $invoice = Invoice::insert([
            'invoice_id' => $request->invoice_id,
            'description' => $request->description,
            'amount' => $request->amount
        ]);

        return redirect()->back()->with('success', 'Invoice Successfully Created');
    }
}
