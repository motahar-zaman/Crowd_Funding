<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonateDetails extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';

    
    public function investment()
    {
        return $this->hasMany('App\Models\Investment', 'project_id');
    }
    public function reward()
    {
        return $this->hasMany('App\Models\Reward', 'project_id');
    }
    public function details()
    {
        return $this->hasMany('App\Models\ProjectDetails', 'project_id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
    public function investedReward()
    {
        return $this->hasManyThrough('App\Models\InvestmentReward', 'App\Models\Investment', 'project_id', 'investment_id');
    }
}
