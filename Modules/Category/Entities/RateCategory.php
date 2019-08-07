<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;

class RateCategory extends Model
{
    protected $table="rate_categories";
    protected $fillable = ['rate','user_id','categorydetails_id'];

    public function categoryDetails(){
        return $this->hasMany('Modules\Category\Model\CategoryDetails\CategoryDetails','categorydetails_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    protected $hidden = [
        'created_at','updated_at'
     ];

}
