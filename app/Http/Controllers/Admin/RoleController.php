<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'لیست نقش ها' ;
        $roles = Role::paginate(15);
        return view('admin.role.list',compact('title','roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'ایجاد نقش جدید' ;
        return view('admin.role.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        Role::query()->create([
            'name' => $request->input('name')
        ]);
        return redirect()->route('roles.index')->with('message','Role Created');
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
        $role = Role::query()->find($id);
        $title = 'ویرایش نقش'.$role->name ;
        return view('admin.role.edit',compact('role','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $role = Role::query()->find($id);
        $role->update([
            'name' => $request->input('name')
        ]);
        return redirect()->route('roles.index')->with('message','Role Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
