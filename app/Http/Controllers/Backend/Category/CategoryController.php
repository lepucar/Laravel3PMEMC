<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

use App\Models\Section;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        
        $categoryData = Category::all();
        return view('backend.pages.category.index', compact('categoryData'));
        
    }

    public function create()
    {
        $sectionData = Section::all();
        $parentCategory = Category::where('parent_id', null)->get();
        $data['sectionData'] = $sectionData;
        $data['categoryData'] = $parentCategory;
        return view('backend.pages.category.create', $data);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|min:3|max:255',
            'slug' =>'required|unique:categories|min:3|max:255',
        ]);
        $validatedData['section_id']=$request->section_id;
        $validatedData['parent_id']=$request->parent_id ?? null;
       
        Category::create($validatedData);
        return redirect()->route('category')->with('success', 'Category created successfully');
    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return redirect('/');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        Category::where('id', $id)->update($data);
        return redirect('/');
    }
    
}
