<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    public function show() {
    	$categories = Category::all();
        return view('pages.categories.index',['categories'=>$categories]);
    }
    public function add_category() {
    	return view('pages.categories.add');
    }

    public function create_category(Request $request) {
    	Category::create($request->all());
        Alert::success('Category added successfully!');
        return view('pages.categories.index');
    }
           
    public function edit(Category $category)
    {
        $data = $category; 
        $id = $category->id;
        // die($data);
        return view('pages.categories.edit',compact('data','id'));
    }

        public function update(UpdateCategoryRequest $request, Category $category)
    {
        
    }

    public function delete($id)
    {       
        Category::where('id',$id)->delete();
        Alert::warning('Delete warning', 'Category removed successfully');
        return back()->with("Delete","Category removed successfuly");
    }
}
