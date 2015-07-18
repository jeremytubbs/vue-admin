<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function postUpload($id, Request $request)
    {
        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $destinationPath = 'uploads/covers';
            $filename = $file->getClientOriginalName();
            $request->file('file')->move($destinationPath, $filename);
            $src = '/' . $destinationPath . '/' . $filename;

            return \Response::json('success', 200);
        }

        return \Response::json('error', 400);
    }
}
