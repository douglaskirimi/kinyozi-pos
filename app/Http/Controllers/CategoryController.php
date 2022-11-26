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
          'category_name' => 'required|unique:categories|max:255',
        ]);

       if($request->file('category_thumbnail')){
            $file= $request->file('category_thumbnail');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Categories Thumbnails'), $filename);
            $data['image']= $filename;

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->category_thumbnail = $filename;
        $category->save();
        }

        else{
        $category = new Category;
        $category->category_name = $request->category_name;
        // $category->category_thumbnail = $filename;
        $category->save();            
        }

       // Category::create($request->all());
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

    public function update(Request $request, Category $category)
    {
          $request->validate([
            'category_name' => 'required',
            'category_thumbnail' => 'required',
        ]);

           $input = $request->all();

           if($request->file('category_thumbnail')){
            $file= $request->file('category_thumbnail');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Categories Thumbnails'), $filename);
            $input['category_thumbnail']= $filename;
        }
        else{
            unset($input['category_thumbnail']);
        }

        if($category->update($input)) {
        Alert::success("Update Category ","Category updated successfuly");
        return redirect()->route('show_categories');            
        }
        else{
        Alert::danger("Error! ","Failed to update category!");
        return redirect()->back();            
        }            
        }
        
        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->category_thumbnail = $filename;
        // $category->save();

        // $category->update($request->validated());
      
    // }

    public function delete($id)
    {       
        Category::where('id',$id)->delete();
        Alert::warning('Remove Category', 'Category removed successfully');
        return back()->with("delete","Customer removed successfully");
    }
}
