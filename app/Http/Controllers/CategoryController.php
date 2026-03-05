<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $title = "category";
        $categories = Category::all();

            return view('dashboard.category.index', compact('title', 'categories'));
    }

    public function create()
    {
        $title = "category - create";
        return view('dashboard.category.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:25',
            'slug' => 'required|unique:categories',
        ]);

        Category::create($validatedData);

        return redirect('/dashboard/category')->with('success', 'New category has been added!');


        // return dd($request->all());
    }

    public function edit(Category $category)
    {
        $title = "category - edit";
        return view('dashboard.category.edit', compact('title', 'category'));
    }

    public function update(Category $category, Request $request)
    {
        $rules = [
            'name' => 'required|min:2|max:25',
        ];

        if (request('slug') != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
            
        }

        $validatedData = $request->validate($rules);

        Category::where('slug', $category->slug)->update($validatedData);

        return redirect('/dashboard/category')->with('success', 'Category has been updated!');
    }

    public function delete(Category $category)
    {
        Category::destroy($category->id);
        return redirect('/dashboard/category')->with('success', 'Category has been deleted!');
    }
}
