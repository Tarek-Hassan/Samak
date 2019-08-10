<?php

namespace Modules\Setting\Model\Advrtisment;

use Illuminate\Database\Eloquent\Model;

class Advrtisment extends Model
{
    protected $fillable = ['title','description','user_id'];
    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
}
