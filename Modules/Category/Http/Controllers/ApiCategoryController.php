<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Category\Model\Category\Repositories\CategoryRepository;

class ApiCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    private $Category;
    /**
     * UserRepository constructor.
     * @param User $User
     */
    public function __construct(CategoryRepository $Category)
    {
        $this->Category = $Category;
    }



    public function all()
    {

        $Category= $this->Category->all();
        return response()->json($Category);
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

        $Category= $this->Category->create($request->all());
        return response()->json([
            'message' => ' success! ',
            'Category' => $Category
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

        $Category= $this->Category->find($id);
        return response()->json([
            'message' => ' Category'.$id,
            'Category' => $Category
        ]);
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

        $Category= $this->Category->update($id,$request->all());
        return response()->json([
            'message' => ' updated! ',
            'Category' => $Category
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

        $this->Category->delete($id);
        return response()->json([
            'message' => 'Successfully deleted !'
        ]);
    }
}
