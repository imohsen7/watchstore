<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(15);
        $title = 'لیست کاربران' ;
        return view('admin.user.list',compact('users','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'ایجاد کاربر جدید' ;
        return view('admin.user.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $image = User::saveImage($request->file);

        User::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'password' => Hash::make($request->input('password')),
            'photo' => $image,
        ]);


        return redirect()->route('users.index')->with('message','User Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::query()->find($id);
        $title = 'ویرایش کاربر '.$user->name ;
        return view('admin.user.edit',compact('user','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditUserRequest $request, string $id)
    {
        $user = User::query()->find($id);
        $image = $user->saveImage($request->file);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'password' => ( $request->input('password') ? Hash::make($request->input('password')) : $user->password)    ,
            'photo' => $image,
        ]);


        return redirect()->route('users.index')->with('message','User Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createUserRoles (string $id)
    {
        $user = User::query()->find($id);
        $roles = Role::all();
        return view('admin.user.user_roles',compact('user','roles'));
    }

    public function storeUserRoles (Request $request,string $id)
    {
        $user = User::query()->find($id);
        $user->syncRoles($request->roles);
        return redirect()->route('users.index')->with('message','User Roles Updated');

    }
}
