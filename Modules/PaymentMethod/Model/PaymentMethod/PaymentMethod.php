<?php

namespace Modules\PaymentMethod\Model\PaymentMethod;


use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{

    protected $fillable = ['paymentmethod'];

    protected $hidden = [
       'created_at','updated_at',
    ];

}
