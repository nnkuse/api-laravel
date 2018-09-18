<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    private $jwtAuth;

    public function __construct(JWTAuth $jwtAuth)
    {
        $this->jwtAuth = $jwtAuth;
    }
    public function login(Request $request)
    {
        $credentials = $request->only('user_name', 'password');

        if (!$token = $this->jwtAuth->attempt($credentials))
        {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }

        $user = $this->jwtAuth->authenticate($token);

        return response()->json(compact('token', 'user'));
    }

    public function refresh()
    {
        $token = $this->jwtAuth->getToken();
        $token = $this->jwtAuth->refresh($token);

        return response()->json(compact('token'));
    }

    public function logout()
    {
        $token = $this->jwtAuth->getToken();
        $this->jwtAuth->invalidate($token);

        return response()->json(['logout']);
    }

    public function listDetail(){
        $token = $this->jwtAuth->getToken();
        $token = $this->jwtAuth->refresh($token);
    }

    public function me()
    {
        if (!$user = $this->jwtAuth->parseToken()->authenticate())
        {
            return response()->json(['error' => 'user_not_found'], 404);
        }

        return response()->json(compact('user'));
    }
}
