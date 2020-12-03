<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_uses';
    protected $primaryKey = 'id';

    // public function createdBy()
    // {
    //     return $this->belongsTo('App\Models\AdminUser', 'created_by');
    // }
}
