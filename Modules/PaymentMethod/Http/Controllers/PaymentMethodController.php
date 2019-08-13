<?php

namespace Modules\PaymentMethod\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PaymentMethod\Model\PaymentMethod\Repositories\PaymentMethodRepository;
use Modules\PaymentMethod\Model\PaymentMethod\Requests\StorePaymentMethodRequest;
use Modules\PaymentMethod\Model\PaymentMethod\Requests\UpdatePaymentMethodRequest;

class PaymentMethodController extends Controller
{
    private $PaymentMethod,$type;
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
    public function index()
    {
        $data=$this->PaymentMethod->all();

        return view('paymentmethod::PaymentMethod.index',compact('data'));

    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function create()
    {
        // $types=$this->type->all();
        return view('paymentmethod::PaymentMethod.create');
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StorePaymentMethodRequest $request)
    {
        $this->PaymentMethod->create($request->all());
        return redirect()->route('paymentmethod.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('paymentmethod::PaymentMethod.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data=$this->PaymentMethod->find($id);
        // $types=$this->type->all();
        return view('paymentmethod::PaymentMethod.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdatePaymentMethodRequest $request, $id)
    {

        //
        $this->PaymentMethod->update($id,$request->all());
        return redirect()->route('paymentmethod.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->PaymentMethod->delete($id);
        return redirect()->route('paymentmethod.index');
    }
}
