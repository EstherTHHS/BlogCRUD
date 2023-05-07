<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:userList', ['only' => ['index']]);
        $this->middleware('permission:userAdd', ['only' => ['create']]);
        $this->middleware('permission:userEdit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:userDelete', ['only' => ['destory']]);

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userData = User::all();

        return view("backend.user.userIndex", compact('userData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userRole = Role::all();
        return view("backend.user.addUser", compact('userRole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $data = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:5|confirmed',
                // 'password_confirmation' => 'required',
                'status' => 'required'
            ]);
            DB::beginTransaction();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]); //for user table
            // $user->assignRole($data['status']);  //for model has role 
            $user->assignRole(0);
            DB::commit();
            return redirect()->route('user.index');
        } catch (Exception $e) {
            DB::rollBack(); //for the catch errors 
            echo $e->getMessage();
        }

        // return $user;




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $userRole = Role::all();
        return (view('backend.user.editUser', compact('user', 'userRole')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            // 'email' => 'required|unique:users,email,except',

            'status' => 'required'
        ]);

        $result = User::where('id', $id)->first();
        $result->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
        $result->syncRoles([$data['status']]);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //     $user->delete();
        //     return redirect()->route('user.index');
    }
}
