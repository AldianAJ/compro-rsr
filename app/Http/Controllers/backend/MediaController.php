<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Media::all();

            return DataTables::of($data)->make(true);
        }
        return view('backend.pages.media.index');
    }

    public function store(Request $request)
    {
        $category = $request->category;
        $title = $request->title;
        $url = $request->url;

        DB::beginTransaction();
        try {
            $media = new Media;
            $media->category = $category;
            $media->title = $title;
            $media->slug = Str::slug($title, '-') . '-' . Str::random(5);
            $media->url = substr($url, 0, 66) . "preview";
            $media->save();
            DB::commit();
            return response()->json(["message" => "Success add new data Media", "code" => 200], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }

    public function destroy(Request $request)
    {
        $media = Media::where('id', $request->id)->first();
        $media->delete();

        return response()->json(["message" => "Data Media successfully deleted", "code" => 200], 200);
    }

    public function edit(Request $request)
    {
        $data = Media::where('id', $request->id)->first();

        return response()->json(["data" => $data, "code" => 200], 200);
    }

    public function update(Request $request)
    {
        $category = $request->category;
        $title = $request->title;
        $url = $request->url;
        $data = Media::where('id', $request->id)->first();

        DB::beginTransaction();
        try {
            $data->category = $category;
            $data->title = $title;
            $data->slug = Str::slug($title, '-') . '-' . Str::random(5);
            $data->url = str_contains($url, "preview") ? $url : substr($url, 0, 66) . "preview";
            $data->save();
            DB::commit();
            return response()->json(["message" => "Success updated data medias", "code" => 200], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }
}
