<?php

namespace Modules\Setting\Model\Privacy;

use Illuminate\Database\Eloquent\Model;

class Privacy extends Model
{
    protected $fillable = ['bodyAr','bodyEn'];
    
    protected $hidden = [
        'created_at','updated_at','id'
     ];
}
