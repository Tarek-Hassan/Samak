<?php

namespace Modules\ManageUsers\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ManageUsers\Model\ManageUsers\Repositories\ManageUsersRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;


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


    public function Login()
    {
        $url = url('/');
        $rules = [
            'name' => 'required',
            'password' => 'required',
        ];

        $Validator = Validator::make(request()->all(), $rules);
        if ($Validator->fails()) {
            return response()->json(['status' => false, 'messages' => $Validator->messages()]);
        } else {

            if (filter_var(request('name'), FILTER_VALIDATE_EMAIL)) {
                if (Auth::attempt(['email' => request('name'), 'password' => request('password') /* , 'active' => 1 */])) {
                    $user = Auth::user();
                    $user->apitoken = str_random(80);
                    $user->save();

                    $userinfo =$Users= $this->User->find($user->id);

                    return response(['status' => true, 'user' => $userinfo, 'token' => $user->apitoken]);
                } else {
                    return response(['status' => false, 'message' => 'Username Or Password Incorrect']);
                }
            } else {
                if (Auth::attempt(['name' => request('name'), 'password' => request('password') /* , 'active' => 1 */])) {
                    $user = Auth::user();
                    $user->apitoken = str_random(80);
                    $user->save();
                    $userinfo =$Users= $this->User->find($user->id);
                    return response(['status' => true, 'user' => $userinfo, 'token' => $user->apitoken]);
                } else {
                    return response(['status' => false, 'message' => 'Username Or Password Incorrect']);
                }
            }
        }
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function Register()
    {
        $rules = [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ];

        $Validator = Validator::make(request()->all(), $rules);
        if ($Validator->fails()) {
            return response()->json(['status' => false, 'messages' => $Validator->messages()]);
        } else {
            try {
                $apitoken = str_random(80);
                $user = $this->User->create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'country' => request('country'),
                    'city' => request('city'),
                    'phone' => request('phone'),
                    'street' => request('street'),
                    'avatar' => request('avatar'),
                    'apitoken' => $apitoken,
                    'password' => bcrypt(request('password')),
                ]);
                $url = url('/');
                $userinfo= $this->User->find($user->id);
                return response(['status' => true, 'user' => $userinfo, 'token' => $apitoken]);
            } catch (Exception $ex) {
                return response()->json(['status' => false, 'messages' => 'Invalid Information']);
            }
        }
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
    public function update($id,Request $request )
    {
        //
        $Users= $this->User->update($id,$request->all());
        return response()->json($Users);
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
