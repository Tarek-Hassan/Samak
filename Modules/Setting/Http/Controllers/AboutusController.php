<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Model\AboutUs\Repositories\AboutUsRepository;
use Modules\Setting\Model\AboutUs\Requests\StoreAboutUsRequest;
use Modules\Setting\Model\AboutUs\Requests\UpdateAboutUsRequest;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    private $AboutUs;
    /**
     * UserRepository constructor.
     * @param AboutUs $AboutUs
     */
    public function __construct(AboutUsRepository $AboutUs)
    {
        $this->AboutUs = $AboutUs;
    }





    public function index()
    {
        $data=$this->AboutUs->all();
        if($data){
            return view('setting::AboutUs.edit',compact('data'));
        }
            else{

                return view('setting::AboutUs.create');
            }

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function create()
    {
        return view('setting::AboutUs.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreAboutUsRequest $request)
    {
        $this->AboutUs->create($request->all());
        return redirect()->route('aboutus.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('setting::AboutUs.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data=$this->AboutUs->find($id);
        return view('setting::AboutUs.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateAboutUsRequest $request, $id)
    {

        //
        $this->AboutUs->update($id,$request->all());
        return redirect()->route('aboutus.edit',[1]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->AboutUs->delete($id);
        return redirect()->route('aboutus.index');
    }
}
