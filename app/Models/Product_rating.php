<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_rating extends Model
{
  protected $table = 'product_ratings';

  public function product()
  {
      return $this->belongsTo('App\Models\Product', 'product_id');
  }

}
