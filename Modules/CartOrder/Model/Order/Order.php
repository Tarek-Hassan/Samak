<?php

namespace Modules\CartOrder\Model\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status','estimatedtime','country','city','street','deliveryfee','payment_id','user_id'];
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function payment(){
        return $this->belongsTo('Modules\PaymentMethod\Model\PaymentMethod\PaymentMethod','payment_id');
    }
    public function orderdetails(){
        return $this->hasMany('Modules\CartOrder\Model\OrderDetails\OrderDetails','order_id');
    }
    protected $hidden = [
        'created_at','updated_at',
     ];
}
