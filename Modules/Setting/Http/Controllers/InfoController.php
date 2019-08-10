<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Model\Info\Repositories\InfoRepository;
use Modules\Setting\Model\Info\Requests\StoreInfoRequest;
use Modules\Setting\Model\Info\Requests\UpdateInfoRequest;

class InfoController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return Response
     */


    private $Info;
    /**
     * UserRepository constructor.
     * @param Info $Info
     */
    public function __construct(InfoRepository $Info)
    {
        $this->Info = $Info;
    }





    public function index()
    {
        $data=$this->Info->all();
        if($data){
            return view('setting::Info.edit',compact('data'));
        }
            else{
                return view('setting::Info.create');

            }
        // return view('setting::Info.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function create()
    {
        return view('setting::Info.create');
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreInfoRequest $request)
    {
        $this->Info->create($request->all());
        return redirect()->route('info.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('setting::Info.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data=$this->Info->find($id);
        return view('setting::Info.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateInfoRequest $request, $id)
    {

        //
        $this->Info->update($id,$request->all());
        return redirect()->route('info.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->Info->delete($id);
        return redirect()->route('info.index');
    }
}
