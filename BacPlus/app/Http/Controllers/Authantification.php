<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Authantification extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

public function register(Request $request){
       $requestValid = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);
       return response()->json($requestValid);
//       if($requestValid){
//           User::create([
//               'name' => $requestValid['name'],
//               'email' => $requestValid['email'],
//               'password' => Hash::make($requestValid['password']),
//           ]);
//           return response()->json(['message' => 'User Created Successfully'],200);
//       }
//       else{
//           return response()->json(['message' => 'User Created Failed'],400);
//       }

}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
