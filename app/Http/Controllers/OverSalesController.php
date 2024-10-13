<?php

namespace App\Http\Controllers;

use App\Models\OverSale;
use App\Models\Salesman;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OverSalesController extends Controller
{
    public function index()
    {
        $oversales = DB::table('oversales')
    ->join('salesmans', 'oversales.salesman_id', '=', 'salesmans.id')
    ->select(
        'oversales.id',
        'salesmans.salesman_id as salesman_name', // Select the salesman's name
        'oversales.total_sales',
        'oversales.number_of_sales',
        'oversales.average_sales_value',
        'oversales.total_customer'
    )
    ->get();
        $salesmen=Salesman::all();
        return view('oversales.index', compact('oversales','salesmen'));
    }

   

    public function store(Request $request)
    {
        $request->validate([
            'salesman_id' => 'required',
            'total_sales' => 'required|numeric',
            'number_of_sales' => 'required|integer',
            'average_sales_value' => 'required|numeric',
            'total_customer' => 'required|integer',
        ]);

        OverSale::create($request->all());

        return redirect()->route('oversales.index')->with('success', 'OverSale record created successfully.');
    }

    public function show($id)
    {
        $oversale = OverSale::with('salesmans') // Assuming there is a 'salesman' relationship on OverSale model
                    ->findOrFail($id);
    
        return response()->json($oversale);
    }
    public function edit($id)
{
    $oversale = OverSale::findOrFail($id);
    $salesmen = Salesman::all(); // Assuming you have a Salesman model for the dropdown

    return view('oversales.edit', compact('oversale', 'salesmen'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'salesman_id' => 'required',
            'total_sales' => 'required|numeric',
            'number_of_sales' => 'required|integer',
            'average_sales_value' => 'required|numeric',
            'total_customer' => 'required|integer',
        ]);

        $oversale = OverSale::findOrFail($id);
        $oversale->update($request->all());

        return redirect()->route('oversales.index')->with('success', 'OverSale record updated successfully.');
    }

    public function destroy($id)
    {
        $oversale = OverSale::findOrFail($id);
        $oversale->delete();

        return redirect()->route('oversales.index')->with('success', 'OverSale record deleted successfully.');
    }
}
