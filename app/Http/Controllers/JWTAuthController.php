<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\User;

class JWTAuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register']]);
    }
	/**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'First Name' => 'required|max:255',
			'Last Name' => 'required|max:255',
			'Gender' => 'required',
			'Date of Birth' => 'required|date',
			'Nationality' => 'required|max:255',
			'Ethnicity' => 'required|max:255',
			'Primary Sport' => 'required|max:255',
			'Planned University Entry Date' => 'required|date',
			'School Attended/Attending' => 'required|max:255',
			'Interested Area(s) of Study' => 'required|max:255',
			'Preffered Location' => 'required|max:255',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|confirmed|string|min:6',
			
        ]);

        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));

        return response()->json([
            'message' => 'Successfully registered',
            'user' => $user
        ], 201);
    }

}
