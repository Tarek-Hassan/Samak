<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Model\AboutUs\Repositories\AboutUsRepository;
use Modules\Setting\Model\Advrtisment\Repositories\AdvrtismentRepository;
use Modules\Setting\Model\Privacy\Repositories\PrivacyRepository;
use Modules\Setting\Model\Info\Repositories\InfoRepository;

class APISettingController extends Controller
{


    private $aboutus,$advrtisment,$privacy;
    /**
     * UserRepository constructor.
     * @param User $User
     */
    public function __construct(AboutUsRepository $aboutus,AdvrtismentRepository $advrtisment,PrivacyRepository $privacy,InfoRepository $info)
    {
        $this->aboutus = $aboutus;
        $this->advrtisment = $advrtisment;
        $this->privacy = $privacy;
        $this->info = $info;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function aboutus()
    {
        $aboutus= $this->aboutus->all();
        return response()->json($aboutus);
    }
    public function advrtisment()
    {
        $advrtisment= $this->advrtisment->all();
        return response()->json($advrtisment);
    }
    public function privacy()
    {
        $privacy= $this->privacy->all();
        return response()->json($privacy);
    }
    public function contact()
    {
        $info= $this->info->contact();
        return response()->json($info);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('setting::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('setting::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
