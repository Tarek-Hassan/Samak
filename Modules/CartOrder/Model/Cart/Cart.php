<?php

namespace Modules\CartOrder\Model\Cart;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['quantity','price','size','cooked','cutting','cleaned','categorydetails_id','user_id'];
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
