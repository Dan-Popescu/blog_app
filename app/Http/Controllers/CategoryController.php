<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function manageCategories()
    {
        return view('categories.manage', ['categories' => Category::all()]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories', 'regex:/^[A-Za-z\s]+([-][A-Za-z\s]+)*$/'],
            'color' => 'required|string|max:7|regex:/^#[a-fA-F0-9]{6}$/',
        ]);

        Category::create($request->all());

        return redirect()->intended(route('categories.create'))->with('success', 'Category successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', ['category'=>$category]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category'=>$category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');

    }

    public function showDeleteCategories(){
        return view('categories.delete', ['categories' => Category::all()]);
    }

    public function deleteCategories(Request $request)
    {
        $request->validate([
            'categories' => 'required|array',
            'categories.*' => 'integer|exists:categories,id',
        ]);

        Category::destroy($request->categories);

        return redirect()->back()->with('success', 'Categories deleted successfully.');
    }

}
