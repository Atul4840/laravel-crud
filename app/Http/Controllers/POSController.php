<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Pos;
use Illuminate\Http\Request;

class POSController extends Controller
{
  public function index()
    {
       // $customers = Customer::all();
        $products = Product::all();
        return view('pos.index', compact( 'products'));
    }


    public function saveTransaction(Request $request)
    {

       
        // Create a new transaction record
        $transaction = Pos::create([
            'customer_name' => $request->input('customer'),
            'discount' => $request->input('discount', 0),
            'selected_products' => $request->input('selected_products_hidden', []), 
        ]); 

       // dd($request->input('selected_products_hidden', []));

        // Redirect or return a response as needed
        return redirect()->route('pos.index')->with('success', 'Transaction saved successfully!');
    }


  public function invoices()
   {
    $invoices = Pos::all(); // Assuming Pos is the model for your invoices
    return view('pos.invoices', compact('invoices'));
   }



}
