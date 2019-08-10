<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Model\Advrtisment\Repositories\AdvrtismentRepository;
use Modules\Setting\Model\Advrtisment\Requests\StoreAdvrtismentRequest;
use Modules\Setting\Model\Advrtisment\Requests\UpdateAdvrtismentRequest;

class AdvrtismentController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return Response
     */


    private $Advrtisment;
    /**
     * UserRepository constructor.
     * @param Advrtisment $Advrtisment
     */
    public function __construct(AdvrtismentRepository $Advrtisment)
    {
        $this->Advrtisment = $Advrtisment;
    }


  


    public function index()
    {
        $data=$this->Advrtisment->allData();
        return view('setting::Advrtisment.index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
  
    public function create()
    {
        return view('setting::Advrtisment.create');
    }

    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreAdvrtismentRequest $request)
    {
        $this->Advrtisment->create($request->all());
        return redirect()->route('advrtisment.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('setting::Advrtisment.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data=$this->Advrtisment->find($id);
        return view('setting::Advrtisment.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateAdvrtismentRequest $request, $id)
    {
       
        //
        $this->Advrtisment->update($id,$request->all());
        return redirect()->route('advrtisment.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->Advrtisment->delete($id);
        return redirect()->route('advrtisment.index');
    }
}
