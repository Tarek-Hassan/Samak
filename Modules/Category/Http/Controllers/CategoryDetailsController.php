<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Category\Model\Category\Repositories\CategoryRepository;
use Modules\Category\Model\CategoryDetails\Repositories\CategoryDetailsRepository;
use Modules\Category\Model\CategoryDetails\Requests\StoreCategoryDetailsRequest;
use Modules\Category\Model\CategoryDetails\Requests\UpdateCategoryDetailsRequest;
use Modules\Category\Entities\Image;
use Auth;


class CategoryDetailsController extends Controller
{
    private $Category,$CategoryDetails,$image;
    /**
     * UserRepository constructor.
     * @param Category $Category
     */
    public function __construct(CategoryRepository $Category,CategoryDetailsRepository $CategoryDetails,Image $image)
    {
        $this->Category = $Category;
        $this->CategoryDetails = $CategoryDetails;
        $this->image = $image;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // dd($this->CategoryDetails);
        $data=$this->CategoryDetails->all();
        return view('category::CategoryDetails.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories=$this->Category->all();

        return view('category::CategoryDetails.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreCategoryDetailsRequest $request)
    {

        $this->CategoryDetails->create($request->all());
        return redirect()->route('categorydetails.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('category::CategoryDetails.show');
    }
    // // this Favourate and Unfavourate
    // public function favorite(Request $request)
    // {
    //       return $this->CategoryDetails->favorite($request->id);
    // }


//     public function myFavorites()
// {
//     $data = $this->CategoryDetails->myFavorites();
//     return view('category::CategoryDetails.favourate',compact('data'));
// }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

        $data=$this->CategoryDetails->find($id);
        $images=$this->image->where('categorydetails_id',$id)->get();
        $categories=$this->Category->all();
        return view('category::CategoryDetails.edit',compact('data','categories','images'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateCategoryDetailsRequest $request, $id)
    {
        //
        $this->CategoryDetails->update($id,$request->all());
        return redirect()->route('categorydetails.index');
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
        return redirect()->route('categorydetails.index');
    }
}
