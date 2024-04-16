<?php
// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $categories = Category::all();
        return view('Admin.Category.add-category',compact('user'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function showCategory(){
        $user=Auth::user();
        $categories=Category::all();
        return view('Admin.Category.view-categories',compact('user','categories'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'category_name' => 'required|string|max:255|regex:/^[^0-9!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]*$/',
            ]);

            $category = Category::create($validatedData);

            return back()->with('message', 'Category added successfully');
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            return back()->with('error', 'Error adding category');
        }
    }


public function edit($id){
    $user=Auth::user();
    $category = Category::findOrFail($id);
    return view('Admin.Category.edit-category', compact('user','category'));

}

public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);

    try {
        $validatedData = $request->validate([
            'category_name' => ['required', 'string', 'max:255', 'regex:/^[^0-9!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]*$/'],
        ]);

        $category->update($validatedData);

        return back()->with('message', 'Category Updated successfully');
    } catch (\Exception $e) {
        // Log the error or handle it appropriately
        return back()->with('error', 'Error Updating Category');
    }
}


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();


    }
}
