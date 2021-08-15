<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('dashboard', compact('customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'userName' => 'required|max:255',
            'password' => 'required|max:255',
            'address' => 'required|max:255',
            'balance' => 'required|max:255']);
        
        Customer::insert([
            'name' => $request->name,
            'userName' => $request->userName,
            'password' => $request->password,
            'address' => $request->address,
            'balance' => $request->balance]);            
        
            return Redirect()->back()->with('success', 'Customer Successfully Created');   
        
        }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $update = Customer::find($id)->update([
            'name' => $request->name,
            'userName' => $request->userName,
            'password' => $request->password,
            'address' => $request->address,
            'balance' => $request->balance]);            
        return Redirect()->route('customers')->with('success', 'Customer Successfully Updated'); 

    }

    public function destroy($id)
    {
        $delete = Customer::find($id)->delete();
        return Redirect()->route('customers')->with('success', 'Customer Successfully Deleted'); 

    }

        
}
