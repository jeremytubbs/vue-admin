<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Content;
use App\Template;

class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contents = Content::with('category', 'template')->get();
        return count($contents) > 0 ? $contents : '';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    // public function store(Request $request)
    // {
    //     $content = new Content();
    //     $content->slug = $request->get('title');
    //     $content->fill($request);
    //     $content->save();
    // }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return Response
     */
    public function show($id)
    {
        $content = Content::with('template')->find($id);
        return $content;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
