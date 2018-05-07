<?php

namespace App;


class Comment extends Model
{
  public function ProductDetails()
  {
    //comment->product_details
    return $this->belongsTo(ProductDetails::class);
  }

  public function User()
  {
    //comment->product_details
    return $this->belongsTo(User::class);
  }
}
