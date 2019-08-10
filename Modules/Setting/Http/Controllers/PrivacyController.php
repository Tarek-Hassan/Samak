<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Model\Privacy\Repositories\PrivacyRepository;
use Modules\Setting\Model\Privacy\Requests\StorePrivacyRequest;
use Modules\Setting\Model\Privacy\Requests\UpdatePrivacyRequest;

class PrivacyController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return Response
     */


    private $Privacy;
    /**
     * UserRepository constructor.
     * @param Privacy $Privacy
     */
    public function __construct(PrivacyRepository $Privacy)
    {
        $this->Privacy = $Privacy;
    }





    public function index()
    {
        $data=$this->Privacy->all();
        if($data){
            return view('setting::Privacy.edit',compact('data'));
        }
            else{
                return view('setting::Privacy.create');

            }
        // return view('setting::Privacy.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function create()
    {
        return view('setting::Privacy.create');
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StorePrivacyRequest $request)
    {
        $this->Privacy->create($request->all());
        return redirect()->route('privacy.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('setting::Privacy.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data=$this->Privacy->find($id);
        return view('setting::Privacy.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdatePrivacyRequest $request, $id)
    {

        //
        $this->Privacy->update($id,$request->all());
        return redirect()->route('privacy.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->Privacy->delete($id);
        return redirect()->route('privacy.index');
    }
}
