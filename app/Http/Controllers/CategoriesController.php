<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use  \App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
  public function index()
  {
     return view('/categories/main');
  }
  public function AddView()
  {
     return view('/categories/add');
  }

  public function Add(Request $req)
  {

    $validator=  \Validator::make($req->all(), [
        'name' => 'required|string|max:100|alpha',
        'description' => 'required',
        'picture'=>'image|mimes:jpg,jpeg,bmp,png',
        //'parentId' => 'required|integer',
    ]);
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $cat=new Category;
    $cat->name        = $req->all()['name'];
    $cat->description = $req->all()['description'];
    //$cat->parent_id    = $req->all()['parentId'];
    /*store the path
    $img = $req->file("picture");
    Storage::putFileAs
    (
      'public/images',
      $img,
      "cat_".$cat->name.".".$img->getClientOriginalExtension()
    );
    $cat->picture = "storage/images/" ."cat_".$cat->name.".".$img->getClientOriginalExtension();
    */
    $cat->save();
    return redirect('/categories');
  }
  
  public function GetCategories()
  {
     $categories=DB::table('categories')->latest()->get();
      return view('/categories/main',compact('categories'));
  }

  /*public function GetParent()
  {
    $Pcategory=DB::table('parent_categories')->latest()->get();
    return view('/categories/add',compact('Pcategory'));
  }*/

  /********* Edit a category ***********/

  public function EditView($id)
  {
     $cat = Category::find($id);
     return view('/categories/edit', compact('cat','id'));
  }

  public function Edit(Request $req, $id)
  {   
      $validator=  \Validator::make($req->all(), [
      'name' => 'required|string|max:100|alpha',
      'description' => 'required',
      //'picture'=>'required|image|mimes:jpeg,bmp,png',
      //'parentId' => 'required|integer',
      ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      }
      else 
      {
          $cat = Category::find($id);
          $cat->name        = $req->all()['name'];
          $cat->description = $req->all()['description']; 
          // cat->pic =
          $cat->save(); 
          return redirect('categories');
      }
  }

/********* Remove a category ***********/

  public function destroy($id)
  {
      // delete
      $Category = Category::find($id);
      $Category->delete();
      return redirect('/categories');
  }

      /***

      Still to do: 
        - Show a text to the user ($log = ($Category->name." deleted successfully.");)

      IDEA FOR LATER: Add a "Undo delete" feature.

      ***/
  
}
