<?php

namespace Modules\PaymentMethod\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PaymentMethod\Model\PaymentMethod\Repositories\PaymentMethodRepository;
use Modules\PaymentMethod\Model\PaymentMethod\Requests\StorePaymentMethodRequest;
use Modules\PaymentMethod\Model\PaymentMethod\Requests\UpdatePaymentMethodRequest;

class ApiPaymentMethodController extends Controller
{
    private $PaymentMethod;
    /**
     * UserRepository constructor.
     * @param PaymentMethod $PaymentMethod
     */
    public function __construct(PaymentMethodRepository $PaymentMethod)
    {
        $this->PaymentMethod = $PaymentMethod;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
  public function all()
    {
        $PaymentMethod= $this->PaymentMethod->all();
        return response()->json($PaymentMethod);
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */


}
