<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
    public function store(Request $request, Role $roles)
    {
        try {
            return response()->json([
                'role' => $roles->create($request->validated())
            ]);
        } catch(\Exception) {
            return response()->json([
                'error_message' => 'Oops, something went wrong'
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
    public function update(Request $request, Role $roles)
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
    public function destroy(Role $roles)
    {
        try {
            return response()->json([
                'role' => $roles->delete()
            ]);
        } catch(\Exception) {
            return response()->json([
                'error_message' => 'Oops, something went wrong'
            ]);
        }
    }
}