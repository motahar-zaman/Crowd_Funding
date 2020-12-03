<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
    protected $table = 'threads';
    protected $primaryKey = 'id';

    
    public function side1()
    {
        return $this->hasOne('App\User', 'id', 'side_1');
    }
    
    public function side2()
    {
        return $this->hasOne('App\User', 'id', 'side_2');
    }
}
