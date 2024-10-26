<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Validator;
class ProductController extends Controller
{
    // Show the product entry form

    public function index()
{
    // Fetch products and return view
    $products = Product::all(); // Adjust according to your logic
    return view('index', compact('products'));
}
    public function create()
    {
        return view('product_entry');
    }

    // Store the new product
    public function store(Request $request)
    {  
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'manufacturing_date' => 'required|date',
            'expiry_date' => 'required|date|after_or_equal:manufacturing_date',
            'batch_number' => 'required|string|max:255',
            'product_packaging' => 'required|string|max:50',
            'product_category'=> 'required|string|max:50',
            'stock_count' => 'required|integer|min:0',
            'product_quantity' => 'required|integer|min:1', 
            'quantityUnit' => 'required|string|max:50',
            'mrp' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
        ]);
    
        // Use request()->input() to get the validated data directly
        $product = Product::create([
            'product_name' => $validatedData['product_name'],
            'manufacturing_date' => $validatedData['manufacturing_date'],
            'expiry_date' => $validatedData['expiry_date'],
            'batch_number' => $validatedData['batch_number'],
            'packaging' => $validatedData['product_packaging'],
            'stock_count' => $validatedData['stock_count'],
            'category' => $validatedData['product_category'], 
           'quantity' => $validatedData['product_quantity'],
            'quantity_unit' => $validatedData['quantityUnit'],
            'mrp' => $validatedData['mrp'],
            'description' => $validatedData['description'],
        ]);
    
        // Redirect back to the form with a success message
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }
    
    public function edit($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Return the edit view with the product data
        return view('product_edit', compact('product'));
    }

    // Handle the update request
    public function update(Request $request, $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'manufacturing_date' => 'required|date',
            'expiry_date' => 'required|date|after:manufacturing_date',
            'batch_number' => 'required|string|max:100',
            'product_packaging' => 'required|string|max:50',
            'stock_count' => 'required|integer|min:0',
            'product_category' => 'required|string|max:100',
            'product_quantity' => 'required|integer|min:0',
            'quantityUnit' => 'required|string|max:10',
            'mrp' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update the product with the validated data
        $product->update([
            'product_name' => $request->input('product_name'),
            'manufacturing_date' => $request->input('manufacturing_date'),
            'expiry_date' => $request->input('expiry_date'),
            'batch_number' => $request->input('batch_number'),
            'packaging' => $request->input('product_packaging'),
            'stock_count' => $request->input('stock_count'),
            'category' => $request->input('product_category'),
            'quantity' => $request->input('product_quantity'),
            'quantity_unit' => $request->input('quantityUnit'),
            'mrp' => $request->input('mrp'),
            'description' => $request->input('description'),
        ]);

        // Redirect to the products index with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);
    
        // Delete the product
        $product->delete();
    
        // Redirect back to the products list with a success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
    
}
