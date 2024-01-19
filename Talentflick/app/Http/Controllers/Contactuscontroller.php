<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactusModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class Contactuscontroller extends Controller
{



    public function contactus(Request $request)
    {
        $alldata = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        if ($alldata->fails()) {

            return response()->json([
                'status' => 422,
                'message' => $alldata->messages()
            ]);
        } else {

            $message = ContactusModel::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message
            ]);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message
            ];

            Mail::to('tamizhchemmal@gmail.com')->send(new ContactMail($data));

            return response()->json([
                'status' => 200,
                'message' => "Thanks for Contacting Us.. we will reach you soon..",
                'data' => $message
            ]);
        }


        // if ($alldata->fails()) {
        //     return response()->json([
        //         'status' => 422,
        //         'errors' => $alldata->messages()
        //     ]);
        // } else {
        //     $message = ContactusModel::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'message' => $request->text
        //     ]);
        //     if ($message) {
        //         return response()->json([
        //             'status' => 200,
        //             'message' => "Thanks for your message we will connect with you soon"
        //         ]);
        //     } else {
        //         return response()->json([
        //             'status' => 500,
        //             'message' => "Internal error or u dont know i dont know"
        //         ]);
        //     }
        // }
    }

    public function contactusview()
    {


        return response()->json([
            'status' => 200,
            'message' => "Working"
        ]);
    }
    //


}
