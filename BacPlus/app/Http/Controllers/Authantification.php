<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\Providers\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


/**
 * @OA\Info(
 *     title="BacPlus",
 *     version="1.0.0",
 *     description="Ce API est pour mon projet de filerouge"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */

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
     * @OA\Get(
     *     path="/api/Auth/register",
     *     operationId="showRegisterForm",
     *     tags={"Authentication"},
     *     summary="Display the user registration form",
     *     description="Returns the registration form view for new users.",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response. Returns registration form.",
     *         @OA\MediaType(
     *             mediaType="text/html"
     *         )
     *     )
     * )
     */
    public function showRegisterForm(){
        return view('Pages.Auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * @OA\Post(
     *     path="/api/Auth/CreeUser",
     *     summary="Register a new user",
     *     security={{"bearerAuth":{}}},
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","email","password"},
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="johndoe@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="secret123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User Created Successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="User Created Successfully"),
     *             @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOi...")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 example={"email": {"The email field is required."}}
     *             )
     *         )
     *     )
     * )
     */

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
            if (! $token = JWTAuth::fromUser($user)) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'token_creation_failed'], 500);
        }

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);



}
    /**
     * @OA\Get(
     *     path="/api/Auth/logi",
     *     operationId="ShowLoginForm",
     *     tags={"Authentication"},
     *     summary="Display the user login form",
     *     description="Returns the login form view for new users.",
     *     @OA\Response(
     *         response=200,
     *         description="Successful response. Returns login form.",
     *         @OA\MediaType(
     *             mediaType="text/html"
     *         )
     *     )
     * )
     */
public function ShowLoginForm(){
        return view('Pages.Auth.login');
}

    /**
     * @OA\Post(
     *     path="/api/Auth/login",
     *     summary="Connexion utilisateur",
     *     description="Permet à un utilisateur de se connecter avec email et mot de passe, et retourne un token JWT.",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="secret123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Connexion réussie",
     *         @OA\JsonContent(
     *             @OA\Property(property="user", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="John Doe"),
     *                 @OA\Property(property="email", type="string", example="user@example.com")
     *             ),
     *             @OA\Property(property="tocken", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGci...")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Email ou mot de passe incorrect",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="votre mot de passe incorrect")
     *         )
     *     )
     * )
     */

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
            }
            else{
                return response()->json(['massage','votre mot de passe incorrect'],422);
            }
        }
        else{
            return response()->json(['massage','votre mot de passe incorrect'],422);
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
