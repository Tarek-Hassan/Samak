<?php

namespace Modules\CartOrder\Model\OrderDetails;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = ['quantity','price','size','cooked','cutting','cleaned','categorydetails_id','order_id'];

    public function categoryDetails(){
        return $this->belongsTo('Modules\Category\Model\CategoryDetails\CategoryDetails','categorydetails_id');
    }
    public function order(){
        return $this->belongsTo('Modules\CartOrder\Model\Order\Order','order_id');
    }
    protected $hidden = [
        'created_at','updated_at','categorydetails_id','order_id'
     ];
}
