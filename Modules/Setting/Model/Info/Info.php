<?php

namespace Modules\Setting\Model\Info;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = ['phone','address','website','email','cuttingprice','cleaningprice','cookingprice','user_id'];
    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
}

