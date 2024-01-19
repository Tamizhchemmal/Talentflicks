<?php

namespace App\Http\Controllers;

use App\Models\MovieRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieRegistrationController extends Controller
{
    // 
    public function movieRegistration(Request $request)
    {


        $validation = Validator::make(($request->all()), [
            'user_name' => 'required|string',
            'email' => 'required|email|unique:movie_registrations',
            'phone_number' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'movie_title' => 'required|string',
            'movie_description' => 'required|string',
            'movie_link_url' => 'required|url',
        ]);





        if ($validation->fails()) {
            return response()->json([
                'error' => $validation->errors()
            ], 400);
        }

        $registration = MovieRegistration::create($request->all());
        return response()->json([
            'message' => 'Registration successful',
            'data' => $registration
        ], 201);
    }
}
