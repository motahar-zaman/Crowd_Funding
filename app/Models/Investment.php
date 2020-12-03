<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:37:32
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-17 13:37:47
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    //
    protected $table = 'investments';
    protected $primaryKey = 'id';

    public function reward()
    {
        return $this->hasMany('App\Models\Reward', 'project_id', 'project_id');
    }
    public function rewardname()
    {
        return $this->hasOne('App\Models\InvestmentReward', 'investment_id', 'id');
    }
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
