<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use QCod\ImageUp\HasImageUploads;

class image extends Model
{
     use HasImageUploads;

    protected $fillable = ['image','categorydetails_id'];

    protected static $imageFields = [
        'image[]',
    ];

    public function categoryDetails(){
        return $this->belongsTo('Modules\Category\Model\CategoryDetails\CategoryDetails','categorydetails_id');
    }
    protected $hidden = [
        'created_at','updated_at'
     ];


}
