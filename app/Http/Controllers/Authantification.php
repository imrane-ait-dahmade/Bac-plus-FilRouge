<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\Providers\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class Authantification extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showRegisterForm(){
        return view('Pages.Auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    public function register(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6',
        ]);


        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        try {

        } catch (JWTException $e) {
        }

    }

    public function ShowLoginForm(){
            return view('Pages.Auth.login');
    }

    public function login(request $request){
     $validate=   $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email' ,$validate['email'])->first();
        if($user){
            if(Hash::check($validate['password'],$user->password)){
                $tocken = JWTAuth::fromUser($user);
                return response()->json([
                    'user'=>$user,
                    'tocken' => $tocken,
                ],200);
            } else {
            }
        } else {
        }

}



    public function logout(request $request){
        $validate = $request->validate([
            'password' => 'required|string|min:6',
        ]);

        if($validate){
            $password = $request->input('password');
            $user =  \Illuminate\Support\Facades\Auth::user();
            if(Hash::check($password , $user->password)){
            } else {
            }
        }
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
