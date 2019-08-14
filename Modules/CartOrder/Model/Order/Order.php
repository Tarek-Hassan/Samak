<?php

namespace Modules\CartOrder\Model\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status','estimatedtime','country','city','street','deliveryfee','payment_id','user_id'];
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
