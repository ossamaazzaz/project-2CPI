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
  public function AddViewEdit()
  {
    return view('/categories/edit');
  }
  public function Add(Request $req)
  {
    $validator=  \Validator::make($req->all(), [
        'name' => 'required|string|max:100|alpha',
        'description' => 'required',
        'picture'=>'required|image|mimes:jpeg,bmp,png',
        'parentId' => 'required|integer',
    ]);
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }
    $cat=new Category;
    $cat->name        = $req->all()['name'];
    $cat->description = $req->all()['description'];
    $cat->parent_id    = $req->all()['parentId'];
    //store the path
    $img = $req->file("picture");
    Storage::putFileAs
    (
      'public/images',
      $img,
      "cat_".$cat->name.".".$img->getClientOriginalExtension()
    );
    $cat->picture = "storage/images/" ."cat_".$cat->name.".".$img->getClientOriginalExtension();
    $cat->save();
    return redirect('/categories');
  }
  public function GetCategories()
  {
     $categories=DB::table('categories')->latest()->get();
      return view('/categories/main',compact('categories'));
  }
  public function GetParent()
  {
    $Pcategory=DB::table('parent_categories')->latest()->get();
    return view('/categories/add',compact('Pcategory'));
  }
}