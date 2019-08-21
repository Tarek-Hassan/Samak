<?php

namespace Modules\Setting\Model\AboutUs;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{  protected $table='about_us';
    protected $fillable = ['bodyAr','bodyEn'];
    protected $hidden = [
        'created_at','updated_at','id'
     ];
}
