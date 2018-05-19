<?php

namespace App\Http\Controllers;

use App\ProductDetails;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function addComment(Request $req,ProductDetails $product){
        $comment=new Comment;
        $comment->user_id=\Auth::id();
        $comment->body=$req->body;
        $comment->product_details_id=$product->id;
        $comment->save();
        return back();
    }

    public function removeComment($id){
      Comment::find($id)->delete();
      return back();
    }

    public function updateComment(Request $req,$id){
      $comment=Comment::find($id);
      $comment->body = $req->body;
      $comment->save();
      return back();
    }
}
