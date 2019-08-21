<?php

namespace Modules\CartOrder\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CartOrder\Model\Order\Repositories\OrderRepository;
use Modules\Category\Model\CategoryDetails\Repositories\CategoryDetailsRepository;
use Modules\CartOrder\Model\OrderDetails\Repositories\OrderDetailsRepository;
use Modules\Setting\Model\Info\Repositories\InfoRepository;

class ApiOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    private $Order;
    /**
     * UserRepository constructor.
     * @param User $User
     */
    public function __construct(OrderRepository $Order,CategoryDetailsRepository $CategoryDetails,InfoRepository $setting,OrderDetailsRepository $orderdetails)
    {
        $this->Order = $Order;
        $this->CategoryDetails = $CategoryDetails;
        $this->setting = $setting;
        $this->orderdetails = $orderdetails;
    }



    public function all()
    {
        $Order= $this->Order->all();
        return response()->json($Order);
    }

    public function myorder($id)
    {
        $Order= $this->Order->allorders($id);
        return response()->json($Order);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function searchorder($id)
    {
        $Order= $this->Order->searchorder($id);
        return response()->json($Order);
    }

    public function orderdetails($id)
    {
        $orderdetails= $this->orderdetails->showOrderDetails($id);
        return response()->json($orderdetails);
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $Order= $this->Order->createapi($request->all());


        return response()->json($Order);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $categoryDetails=$this->CategoryDetails->findcategoryDetails($id);
        $setting=$this->setting->info();
        return response()->json([$categoryDetails,$setting]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update($id,Request $request )
    {
        //
        $Order= $this->Order->update($id,$request->all());
        return response()->json([
            '$Order' => $Order
        ]);
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
        return response()->json([
            'message' => 'Successfully deleted !'
        ]);
    }
}
