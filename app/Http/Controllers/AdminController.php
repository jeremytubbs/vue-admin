<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Content;
use App\Template;

class AdminController extends Controller
{

    protected $disk, $contentDir, $templateDir;

    public function __construct()
    {
        $this->disk = \Storage::disk('local');
        $this->contentDir = '/public/content/';
        $this->templateDir = '/resources/templates/';
    }

    public function postContent(Request $request)
    {
        $content = new Content();
        $content->user_id = \Auth::user()->id;
        $content->slug = $request->input('title');
        $content->fill($request->all());
        $content->save();
        $template = Template::find($request->input('template_id'));
        // make directory for content
        $contentDir = base_path() . $this->contentDir;
        if(! \File::exists($contentDir)) {
            \File::makeDirectory($contentDir, 755);
        }
        $contentDir = $contentDir . $content->id;
        \File::makeDirectory($contentDir, 755);
        $templateDir = base_path() . $this->templateDir . $template->slug;
        \File::copyDirectory($templateDir, $contentDir);
        return response()->json($content->id, 200);
    }

    public function getContent($id)
    {
        $files = $this->disk->files($this->contentDir . $id);
        $response = Content::with('template')->find($id);
        return response()->json(compact('response', 'files'));
    }

    public function updateContent(Request $request, $id)
    {
        $content = Content::find($id);
        $content->fill($request->all());
        $content->featured = $request->input('featured') ? 1 : 0;
        $content->published = $request->input('published') ? 1 : 0;
        $content->published_at = $request->input('published') ? Carbon::now() : null;
        $content->save();
        $files = $this->disk->files($this->contentDir . $id);
        $response = $content;
        return response()->json(compact('response', 'files'));
    }

    public function getEditor($id, $file)
    {
        //
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
            $contentDir = base_path(). $this->contentDir . $id;
            $filename = $file->getClientOriginalName();
            $request->file('file')->move($contentDir, $filename);
            $src = '/' . $contentDir . '/' . $filename;

            return response()->json('success', 200);
        }

        return response()->json('error', 400);
    }
}
