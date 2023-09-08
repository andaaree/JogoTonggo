<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Traits\FeedbackHandler;
class RoleController extends Controller
{
    use FeedbackHandler;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required',
        ]);

        try {
            $role = new Role;
            $role->name = $request->role_name;
            $role->save();

            $ob = $this->gd($role,'tambah');
            $msg = $ob->message;
            return redirect()->route('role.index')->with($msg,$ob);
        } catch (\Throwable $th) {
            $ob = $this->err($role,$th);
            $msg = $ob->message;
            return redirect()->route('role.index')->with($msg,$ob);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
            $ob = $this->gd($role,'hapus');
            return response()->json($ob);
        } catch (\Illuminate\Database\QueryException $th) {
            //throw $th;
            $ob = $this->err($role,$th);
            return response()->json();
        }
    }
}
