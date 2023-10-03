<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sale = new Sale();
        return $sale->all();
    }

    public function create(Request $request)
    {
        $sale = new Sale();
        $sale->id_product = $request->id_product;
        $sale->id_client = $request->id_client;
        $sale->id_employee = $request->id_employee;
        $sale->save();
        return $sale;
    }

    public function show($id)
    {
        $sale = new Sale();
        return $sale->find($id);
    }

    public function update($id, Request $request)
    {
        $sale = Sale::find($id);
        $sale->id_product = $request->id_product;
        $sale->id_client = $request->id_client;
        $sale->id_employee = $request->id_employee;
        $sale->save();
        return $sale;
    }

    public function destroy($id)
    {
        $sale = Sale::find($id);
        $sale->delete();
        return $sale;
    }
}
