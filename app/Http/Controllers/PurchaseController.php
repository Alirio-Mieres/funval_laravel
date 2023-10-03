<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $compras = new Purchase();
        return $compras->all(); 
    }

    public function create(Request $request)
    { 
        $purchase = new Purchase();
        $purchase->amount = $request->amount;
        $purchase->price = $request->price;
        $purchase->id_product = $request->id_product;
        $purchase->id_clientes = $request->id_client;
        $purchase->save();
        return $purchase;
    }

    public function show($id)
    {
        $compra = new Purchase();
        return $compra->find($id);
    }

    public function update($id, Request $request)
    {
        $purchase = Purchase::find($id);
        $purchase->amount = $request->amount;
        $purchase->price = $request->price;
        $purchase->id_product = $request->id_product;
        $purchase->id_clientes = $request->id_client;
        $purchase->save();
        return $purchase;
    }

    public function destroy($id)
    {
        $purchase = Purchase::find($id);
        $purchase->delete();
        return $purchase;
    }
}
