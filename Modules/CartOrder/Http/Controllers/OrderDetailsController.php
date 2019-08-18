<?php

namespace Modules\CartOrder\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CartOrder\Model\OrderDetails\Repositories\OrderDetailsRepository;
use Modules\CartOrder\Model\OrderDetails\Requests\StoreOrderDetailsRequest;
use Modules\CartOrder\Model\OrderDetails\Requests\UpdateOrderDetailsRequest;

class OrderDetailsController extends Controller
{
    private $OrderDetails;
    /**
     * UserRepository constructor.
     * @param OrderDetails $OrderDetails
     */
    public function __construct(OrderDetailsRepository $OrderDetails)
    {
        $this->OrderDetails = $OrderDetails;

    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data=$this->OrderDetails->all();
        return view('cartorder::OrderDetails.index',compact('data'));

    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function create()
    {
         $carts=$this->cart->all();
        return view('cartorder::OrderDetails.create',compact('carts'));
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreOrderDetailsRequest $request)
    {
        $this->OrderDetails->create($request->all());
        return redirect()->route('orderdetails.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $data=$this->OrderDetails->showOrderDetails($id);
        return view('cartorder::OrderDetails.show',compact('data'));
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
        return view('cartorder::OrderDetails.create',compact('data','setting'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateOrderDetailsRequest $request, $id)
    {

        //
        $this->OrderDetails->update($id,$request->all());
        return redirect()->route('orderdetails.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->OrderDetails->delete($id);
        return redirect()->route('orderdetails.index');
    }
}
