<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        return Gallery::all();
    }

    public function show($id)
    {
        return Gallery::find($id);
    }

    public function create(Request $request)
    {
        $gallery = new Gallery();

        $gallery->name = $request->input('name');
        $gallery->desc = $request->input('desc');
        $gallery->url_list = $request->input('url_list');

        $gallery->save();

        return $gallery;
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);

        $gallery->name = $request->input('name');
        $gallery->desc = $request->input('desc');
        $gallery->url_list = $request->input('url_list');

        $gallery->save();

        return $gallery;
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        $gallery->delete();

        return new JsonResponse(true);
    }

}
