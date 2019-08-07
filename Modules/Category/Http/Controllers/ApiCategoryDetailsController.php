<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Category\Model\CategoryDetails\Repositories\CategoryDetailsRepository;
class ApiCategoryDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    private $CategoryDetails;
    /**
     * UserRepository constructor.
     * @param User $User
     */
    public function __construct(CategoryDetailsRepository $CategoryDetails)
    {
        $this->CategoryDetails = $CategoryDetails;
    }



    public function all()
    {
        // $CategoryDetails= $this->CategoryDetails->all();
        $CategoryDetails= $this->CategoryDetails->allData();
        return response()->json($CategoryDetails);
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
    public function store(Request $request)
    {
        //

        $CategoryDetails= $this->CategoryDetails->create($request->all());
        return response()->json([
            'message' => ' success! ',
            'CategoryDetails' => $CategoryDetails
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $CategoryDetails= $this->CategoryDetails->find($id);
        return response()->json($CategoryDetails);
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

        $CategoryDetails= $this->CategoryDetails->update($id,$request->all());
        return response()->json([
            'message' => ' updated! ',
            'CategoryDetails' => $CategoryDetails
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

        $this->CategoryDetails->delete($id);
        return response()->json([
            'message' => 'Successfully deleted !'
        ]);
    }
}
