<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Category\Model\Category\Repositories\CategoryRepository;
use Modules\Category\Model\Category\Requests\StoreCategoryRequest;
use Modules\Category\Model\Category\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    private $Category,$type;
    /**
     * UserRepository constructor.
     * @param Category $Category
     */
    public function __construct(CategoryRepository $Category)
    {
        $this->Category = $Category;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data=$this->Category->all();

        return view('category::Category.index',compact('data'));

    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function create()
    {
        // $types=$this->type->all();
        return view('category::Category.create');
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->Category->create($request->all());
        return redirect()->route('category.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('category::Category.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data=$this->Category->find($id);
        // $types=$this->type->all();
        return view('category::Category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {

        //
        $this->Category->update($id,$request->all());
        return redirect()->route('category.index');
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
        return redirect()->route('category.index');
    }
}
