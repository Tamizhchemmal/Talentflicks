<?php

namespace App\Http\Controllers;

use App\Mail\InterestedMail;
use App\Models\Interested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class InterestedController extends Controller
{
    //

    public function interested(Request $request)
    {
        $alldata = Validator::make($request->all(), [
            'user_name' => 'required',
            'email' => 'required',

        ]);

        if ($alldata->fails()) {

            return response()->json([
                'status' => 422,
                'message' => $alldata->messages()
            ]);
        } else {
            $interested = Interested::create([
                'user_name' => $request->user_name,
                'email' => $request->email
            ]);

            $data = [
                'user_name' => $request->user_name,
                "email" => $request->email
            ];

            if ($interested) {
                Mail::to('talentwoodinfo@gmail.com')->send(new InterestedMail($data));
                return response()->json([
                    'status' => 200,
                    'message' => "Thanks for Contacting Us.. we will reach you soon..",
                    'data' => $interested
                ]);
            }
        }
    }
}
