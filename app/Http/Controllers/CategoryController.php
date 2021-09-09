<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::orderby('id','DESC')->paginate(5);
        return view('Backend.Category.Index')->with('categories',$category);
    }


    public function create()
    {
        return view('Backend.Category.Create');
    }


    public function store(Request $request)
    {
        Category::create($this->categoryValidation($request->all()));
        return redirect()->route('category.index')->with('message',"Category Added Successfully !!!");
    }

    // public function show(Category $category)
    // {
    //     return $category;
    // }


    public function edit(Category $category)
    {
        return view('Backend.Category.Edit')->with('category',$category);
    }


    public function update(Request $request, Category $category)
    {
        $category->update($this->categoryValidation($request->id));
        return redirect()->route('category.index')->with('message',"Category Updated Successfully !!!");
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('message',"Category Deleted Successfully !!!");
    }

    public function categoryValidation()
    {
        return request()->validate([
            'category_name' => 'required|string'
        ]);
    }
}
