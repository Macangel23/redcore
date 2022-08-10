<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $roles)
    {
        try {
            return response()->json([
                'roles' => $roles->all()
            ]);
        } catch(\Exception) {
            return response()->json([
                'error_message' => 'Oops, something went wrong'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request, Role $roles)
    {
        try {
            return response()->json([
                'role' => $roles->create($request->validated())
            ]);
        } catch(\Exception $e) {
            return response()->json([
                // 'error_message' => 'Oops, something went wrong'
                'error_message' => $e->getMessage()
            ]);
        }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $roles)
    {
        try {
            return response()->json([
                'role' => $roles->fill($request->validated())->save()
            ]);
        } catch(\Exception) {
            return response()->json([
                'error_message' => 'Oops, something went wrong'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $roles,$id)
    {
        try {
            $roles->destroy($id);
            return response()->json([
                'message' => "Role successfully deleted"
            ]);
        } catch(\Exception) {
            return response()->json([
                'error_message' => 'Oops, something went wrong'
            ]);
        }
    }
}
