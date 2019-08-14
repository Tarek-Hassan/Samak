<?php

namespace Modules\Category\Model\Category;
use QCod\ImageUp\HasImageUploads;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasImageUploads;
    protected $fillable = ['category_nameAr','category_nameEn'];
    protected static $imageFields = [
        'category_img',
    ];
    protected $hidden = [
       'created_at','updated_at',
    ];

}
