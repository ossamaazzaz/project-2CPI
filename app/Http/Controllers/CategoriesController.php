<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use  \App\Category;
use  \App\Product;
use App\Shop;
use Illuminate\Http\Request;
/*
* Done by Kacema and Mouloud
*/
class CategoriesController extends Controller{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
  
  public function index()  {
      $categories=DB::table('categories')->latest()->get();
      $shop = Shop::find(1);
      return view('categories.main',compact('categories','shop'));  

    }

  
  public function AddView(){ 
    $shop = Shop::find(1);
    return view('categories.add',compact('shop')) ;  }


  public function Add(Request $req)
  {
    $validator=  \Validator::make($req->all(), [
        'name' => 'required|string|max:100|string',
        'description' => 'required',
        'picture'=>'required|image|mimes:jpg,jpeg,bmp,png',
        //'parentId' => 'required|integer',
    ]);
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $cat=new Category;
    $cat->name        = $req->all()['name'];
    $cat->description = $req->all()['description'];
    //$cat->parent_id    = $req->all()['parentId'];
    //store image path
    $img = $req->file("picture");
    Storage::putFileAs
    (
      'public/images/categories',
      $img,
      $cat->name.".".$img->getClientOriginalExtension()
    );
    $cat->picture = "/storage/images/categories/" .$cat->name.".".$img->getClientOriginalExtension();
    //save
    $cat->save();
    return redirect('admin/categories');
  }


  /*public function GetParent()
  {
    $Pcategory=DB::table('parent_categories')->latest()->get();
    return view('/categories/add',compact('Pcategory'));
  }*/

  /********* Edit a category ***********/

  public function edit($id)
  {
     $cat = Category::find($id);
     $shop = Shop::find(1);
     return view('categories.edit', compact('cat','id','shop'));
  }

  public function submit(Request $req, $id)
  {
    $validator=  \Validator::make($req->all(), [
    'name' => 'required|string|max:100',
    'description' => 'required',
    // deleting required @th3hpbt
    'picture'=>'image|mimes:jpeg,bmp,png',
    //'parentId' => 'required|integer',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }
    $cat = Category::find($id);
    $cat->name        = $req->all()['name'];
    $cat->description = $req->all()['description'];
    $img = $req->file("picture");

    if ($img != null) {
            Storage::putFileAs
            (
              'public/images/categories',
              $img,
              $cat->name.".".$img->getClientOriginalExtension()
            );
            $cat->picture = "/storage/images/categories/" .$cat->name.".".$img->getClientOriginalExtension();
    }
    $cat->save();

    return redirect('admin/categories');
  }

/********* Remove a category ***********/

  public function destroy($id /* + an op arg */ )
  {
    $Category = Category::find($id);
    //First Delete/Uncategorize the products

    if (1==1) //kacem forget to put the right condition or somthng like that (notice it)
    { // Delete all the products of this Category
      Product::where('categoryId',$id)->delete();
    }
    else
    {    // Move them to 'UNCATEGORIZED'
      Product::where($id)->update(['categoryId' => null]);
    }
    //Then Delete the category
    $Category->delete();
    return redirect('admin/categories');
  }
}
