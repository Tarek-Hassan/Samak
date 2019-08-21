<?php

namespace Modules\CartOrder\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CartOrder\Model\Cart\Repositories\CartRepository;
use Modules\Category\Model\CategoryDetails\Repositories\CategoryDetailsRepository;
use Modules\Setting\Model\Info\Repositories\InfoRepository;

class ApiCartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    private $Cart;
    /**
     * UserRepository constructor.
     * @param User $User
     */
    public function __construct(CartRepository $Cart,CategoryDetailsRepository $CategoryDetails,InfoRepository $setting)
    {
        $this->Cart = $Cart;
        $this->CategoryDetails = $CategoryDetails;
        $this->setting = $setting;
    }



    public function all($id)
    {

        // $Cart= $id;
        $Cart= $this->Cart->allData($id);
        return response()->json($Cart);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store($id,Request $request)
    {

        $Cart= $this->Cart->createapi($id,$request->all());
        return response()->json($Cart);
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

        $Cart= $this->Cart->update($id,$request->all());
        return response()->json([
            'message' => ' updated! ',
            '$Cart' => $Cart
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

        $this->Cart->delete($id);
        return response()->json([
            'message' => 'Successfully deleted !'
        ]);
    }
}
