<?php

namespace Modules\ManageUsers\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ManageUsers\Model\ManageUsers\Repositories\ManageUsersRepository;

class ApiManageUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    private $User;
    /**
     * UserRepository constructor.
     * @param User $User
     */
    public function __construct(ManageUsersRepository $User)
    {
        $this->User = $User;
    }



    public function all()
    {


        $Users= $this->User->all();
        return response()->json($Users);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('User::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreUserRequest $request)
    {
        //


        $Users= $this->User->create($request->all());

        return response()->json([
            'message' => ' success! ',
            'User' => $Users
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

        $Users= $this->User->find($id);
        return response()->json([
            'message' => ' User'.$id,
            'User' => $Users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('User::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update($id,UpdateUserRequest $request )
    {
        //

        $Users= $this->User->update($id,$request->all());
        return response()->json([
            'message' => ' updated! ',
            'User' => $Users
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

        $this->User->delete($id);
        return response()->json([
            'message' => 'Successfully deleted !'
        ]);
    }
}
