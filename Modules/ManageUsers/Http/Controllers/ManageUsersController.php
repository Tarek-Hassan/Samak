<?php

namespace Modules\ManageUsers\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ManageUsers\Model\ManageUsers\Repositories\ManageUsersRepository;
use Modules\ManageUsers\Model\ManageUsers\Requests\StoreManageUsersRequest;
use Auth;
use Modules\ManageUsers\Model\ManageUsers\Requests\UpdateManageUsersRequest;
class ManageUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */


    private $ManageUsers;
    /**
     * UserRepository constructor.
     * @param ManageUsers $ManageUsers
     */
    public function __construct(ManageUsersRepository $ManageUsers)
    {
        $this->ManageUsers = $ManageUsers;

    }





    public function index()
    {
        $data=$this->ManageUsers->all();
        return view('manageusers::ManageUsers.index',compact('data'));

    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function create()
    {
        return view('manageusers::ManageUsers.create');
    }
   
    public function insertadmin()
    {
        $d=$this->User->where('email','admin@admin.com',)->where('role' , 'admin',)->get();
        if(count($d)==0){
        $apitoken = str_random(80);
                $user = $this->User->create([
                    'name' => 'admin',
                    'email' => 'admin@admin.com',
                    'role' => 'admin',
                    'apitoken' => $apitoken,
                    'password' => bcrypt(123456789),
                ]);}
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreManageUsersRequest $request)
    {
        $this->ManageUsers->create($request->all());
       return redirect()->route('manageusers.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('manageusers::ManageUsers.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

        $data=$this->ManageUsers->find($id);
        return view('manageusers::ManageUsers.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateManageUsersRequest $request, $id)
    {

        //
        $this->ManageUsers->update($id,$request->all());
       return redirect()->route('manageusers.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $this->ManageUsers->delete($id);
       return redirect()->route('manageusers.index');

    }
}
