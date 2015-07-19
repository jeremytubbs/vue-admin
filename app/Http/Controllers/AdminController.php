<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Content;
use App\Template;

class AdminController extends Controller
{

    public function postContent(Request $request)
    {
        $content = new Content();
        $content->slug = $request->input('title');
        $content->fill($request->all());
        $content->save();
        $template = Template::find($request->input('template_id'));
        $base_path = base_path();
        // make directory for content
        $contentDir = $base_path.'/resources/content/'.$content->id;
        \File::makeDirectory($contentDir);
        $templateDir = $base_path.'/resources/templates/'.$template->slug;
        \File::copyDirectory($templateDir, $contentDir);
    }

    public function postEditor(Request $request)
    {
        //
    }

    public function postUpload($id, Request $request)
    {
        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $base_path = base_path();
            $destinationPath = $base_path.'/resources/content/'.$id;
            $filename = $file->getClientOriginalName();
            $request->file('file')->move($destinationPath, $filename);
            $src = '/' . $destinationPath . '/' . $filename;

            return \Response::json('success', 200);
        }

        return \Response::json('error', 400);
    }
}
