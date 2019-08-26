<?php

namespace Modules\ManageUsers\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ManageUsers\Model\ManageUsers\Repositories\ManageUsersRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Carbon\Carbon;


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


    public function Login(Request $request)
    {
        $url = url('/');
        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ];

        $Validator = Validator::make(request()->all(), $rules);
        $request['active'] = 1;
        $request['deleted_at'] = null;
        if ($Validator->fails()) {
            return response()->json(['status' => false, 'messages' => $Validator->messages()]);
        } else {

            if (filter_var(request('email'), FILTER_VALIDATE_EMAIL)) {
                if (Auth::attempt(['email' => request('email'), 'password' => request('password') /* , 'active' => 1 */])) {
                    $user = Auth::user();
                    $tokenResult = $user->createToken('Personal Access Token');
                    $token = $tokenResult->token;
                    if (request('remember_me'))
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
                    $userinfo =$Users= $this->User->find($user->id);
                    return response()->json([
                        'user' => $userinfo,
                        'access_token' => $tokenResult->accessToken,
                        // 'token_type' => 'Bearer',
                        'expires_at' => Carbon::parse(
                            $tokenResult->token->expires_at
                        )->toDateTimeString()
                    ]);
                    // return response(['status' => true, 'user' => $userinfo, 'token' => $user->apitoken]);

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
                // $apitoken = str_random(80);
                $user = $this->User->create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'country' => request('country'),
                    'city' => request('city'),
                    'phone' => request('phone'),
                    'street' => request('street'),
                    'avatar' => request('avatar'),
                    'activation_token' => str_random(60),
                    'password' => bcrypt(request('password')),
                ]);
                $url = url('/');
                $user->notify(new SignupActivate($user));
                $userinfo= $this->User->find($user->id);
                return response(['status' => true, 'user' => $userinfo]);
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
    public function signupActivate($token)
{
    $user =  $this->User->where('activation_token', $token)->first();
    if (!$user) {
        return response()->json([
            'message' => 'This activation token is invalid.'
        ], 404);
    }
    $user->active = true;
    $user->activation_token = '';
    $user->save();
    return $user;
}
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
