<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        //validate and create
        $validated = $request->validate([
            'name' => 'required|string|max:50|unique:categories,name',
            'type' => 'required|in:income,expense',
            'icon' => 'required|string',
        ]);
        Category::create($validated);
        //redirect with message
        return redirect()->route('categories.index')->with('success', 'New category added!');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        //find and validate category
        $category = Category::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:50|unique:categories,name,' . $id,
            'type' => 'required|in:income,expense',
            'icon' => 'required|string',
        ]);
        //update
        $category->update($validated);
        //redirect with message
        return redirect()->route('categories.index')->with('success', 'Category updated!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        //check if categories contain transactions 
        if ($category->transactions()->exists()) {
            return back()->with('error', 'Cannot delete category. Delete the associated transactions first.');
        }
        //delete and redirect with message
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted!');
    }
}
