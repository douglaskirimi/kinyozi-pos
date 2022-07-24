<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;    
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
       public function index() {
       	 $categories = Category::all();
         return view('pages.categories.index',['categories'=>$categories]);
       }
   public function create_category(Request $request)
    {
      $validatedData = $request->validate([
          'category_name' => 'required|unique:categories|max:255'
        ]);

       Category::create($request->all());
       Alert::success('Add Category','Category added successfully');
       return redirect()->route('show_categories');
    }

    public function showform(Category $category)
    {        
       return view('pages.categories.add');
    }

    public function edit(Category $category)
    {
        $data = $category; 
        $id= $category->id;
        return view('pages.categories.edit',compact('data','id'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        Alert::success("Update Category ","Category updated successfuly");
        return redirect()->route('show_categories');
    }

    public function delete($id)
    {       
        Category::where('id',$id)->delete();
        Alert::warning('Remove Category', 'Category removed successfully');
        return back()->with("delete","Customer removed successfully");
    }
}
