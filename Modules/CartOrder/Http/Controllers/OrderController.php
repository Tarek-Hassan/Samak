<?php

namespace Modules\CartOrder\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CartOrder\Model\Cart\Repositories\CartRepository;
use Modules\PaymentMethod\Model\PaymentMethod\Repositories\PaymentMethodRepository;
use Modules\CartOrder\Model\Order\Repositories\OrderRepository;
use Modules\CartOrder\Model\Order\Requests\StoreOrderRequest;
use Modules\CartOrder\Model\Order\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    private $Order,$cart,$payment;
    /**
     * UserRepository constructor.
     * @param Order $Order
     */
    public function __construct(OrderRepository $Order,CartRepository $cart,PaymentMethodRepository $payment)
    {
        $this->Order = $Order;
        $this->cart = $cart;
        $this->payment = $payment;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data=$this->Order->all();
        return view('cartorder::Order.index',compact('data'));

    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function create()
    {
         $carts=$this->cart->all();
         $payments=$this->payment->all();
        return view('cartorder::Order.create',compact('carts','payments'));
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreOrderRequest $request)
    {
        $this->Order->create($request->all());
        return redirect()->route('order.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('cartorder::Order.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

        $data=$this->CategoryDetails->find($id);
        $setting=$this->setting->all();
        return view('cartorder::Order.create',compact('data','setting'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateOrderRequest $request, $id)
    {

        //
        $this->Order->update($id,$request->all());
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->Order->delete($id);
        return redirect()->route('order.index');
    }
}
