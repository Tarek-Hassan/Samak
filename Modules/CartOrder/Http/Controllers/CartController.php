<?php

namespace Modules\CartOrder\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CartOrder\Model\Cart\Repositories\CartRepository;
use Modules\Category\Model\CategoryDetails\Repositories\CategoryDetailsRepository;
use Modules\Setting\Model\Info\Repositories\InfoRepository;
use Modules\CartOrder\Model\Cart\Requests\StoreCartRequest;
use Modules\CartOrder\Model\Cart\Requests\UpdateCartRequest;

class CartController extends Controller
{
    private $Cart,$CategoryDetails,$setting;
    /**
     * UserRepository constructor.
     * @param Cart $Cart
     */
    public function __construct(CartRepository $Cart,CategoryDetailsRepository $CategoryDetails,InfoRepository $setting)
    {
        $this->Cart = $Cart;
        $this->CategoryDetails = $CategoryDetails;
        $this->setting = $setting;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data=$this->Cart->all();
        return view('cartorder::Cart.index',compact('data'));

    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    // public function create()
    // {
    //     // $types=$this->type->all();
    //     return view('cartorder::Cart.create');
    // }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreCartRequest $request)
    {
        $this->Cart->create($request->all());
        return redirect()->route('cart.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('cartorder::Cart.show');
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
        return view('cartorder::Cart.create',compact('data','setting'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateCartRequest $request, $id)
    {

        //
        $this->Cart->update($id,$request->all());
        return redirect()->route('cart.index');
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
        return redirect()->route('cart.index');
    }
}
