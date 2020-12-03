<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:38:55
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-17 13:39:20
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsColorTemp extends Model
{
    protected $table = 'product_colors_temp';
    protected $primaryKey = 'id';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}