<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $users)
    {
        try {
            return response()->json([
                'users' => $users->all()
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
    public function store(UserRequest $request,User $users)
    {
        try {
            return response()->json([
                'users' => $users->create($request->validated())
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
    public function update(UserRequest $request, User $users)
    {
        return $request;
        try {
            return response()->json([
                'users' => $users->fill($request->validated())->save()
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
    public function destroy(User $users,$id)
    {
        try {
            $users->destroy($id);
            return response()->json([
                'message' => "User successfully deleted"
            ]);
        } catch(\Exception) {
            return response()->json([
                'error_message' => 'Oops, something went wrong'
            ]);
        }
    }
}
