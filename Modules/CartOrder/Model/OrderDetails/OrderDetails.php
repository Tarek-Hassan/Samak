<?php

namespace Modules\CartOrder\Model\OrderDetails;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = ['quantity','price','size','cooked','cutting','cleaned','categorydetails_id','order_id'];
}
