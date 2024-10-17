<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{public function getCategories()
    {
        $categories = Category::all(); // Retrieve all categories from the database
        return response()->json($categories); // Return categories as a JSON response
    }
    
    // Method to handle adding or updating a category
    public function saveCategory(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
        ]);

        // Check if we're editing an existing category or adding a new one
        $categoryId = $request->input('id', null);
        if ($categoryId) {
            // Editing an existing category
            $category = Category::findOrFail($categoryId);
            $category->name = $validated['category'];
            $category->save();
        } else {
            // Adding a new category
            $category = Category::create([
                'name' => $validated['category'],
            ]);
        }

        // Return JSON response with category data
        return response()->json([
            'success' => true,
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
            ],
        ]);
    }
    public function update(Request $request, $id) {
        // Validate the incoming request data
        $request->validate([
            'category' => 'required|string|max:255', // Adjust validation rules as needed
        ]);

        // Find the category by ID
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Category not found'], 404);
        }

        // Update the category name
        $category->name = $request->input('category');
        $category->save();

        // Return a success response
        return response()->json(['success' => true, 'category' => $category]);
    }
    // Method to handle deleting a category
    public function deleteCategory($id)
    {
        // Find and delete the category
        $category = Category::findOrFail($id);
        $category->delete();

        // Return JSON response to confirm deletion
        return response()->json(['success' => true]);
    }
}
