<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\ContentAboutPage;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ContentAboutPageController extends Controller
{
    public function index(Request $request)
    {
        $data['langs'] = Lang::all();
        $data['about_pages'] = AboutPage::all();
        if ($request->ajax()) {

            if (isset($request->id)) {
                $data = ContentAboutPage::where('id', $request->id)->first();

                return response()->json(["data" => $data, "code" => 200], 200);
            }

            $data = DB::table('about_pages as a')
                ->join('content_about_pages as b', 'a.id', '=', 'b.about_page_id')
                ->join('langs as c', 'b.lang_id', '=', 'c.id')
                ->select('a.id as about_page_id', 'a.slug as slug_about_page', 'b.year', 'a.image', 'a.section', 'c.code', 'c.language', 'b.id as content_about_id', 'b.slug as content_about_slug', 'b.title', 'b.content')
                ->get();
            return DataTables::of($data)->make(true);
        }

        return view('backend.pages.content-about-page.index', $data);
    }

    public function store(Request $request)
    {
        $lang_id = $request->lang_id;
        $about_page_id = $request->about_page_id;
        $title = empty($request->title) ? null : $request->title;
        $year = empty($request->year) ? null : $request->year;
        $content = $request->content;

        $check = ContentAboutPage::where([
            "lang_id" => $lang_id,
            "about_page_id" => $about_page_id
        ])->first();

        if ($check && $check->about_page_id != 4) {
            return response()->json(["message" => "Content with section and language input already exist", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $data = new ContentAboutPage;
            $data->about_page_id = $about_page_id;
            $data->lang_id = $lang_id;
            $data->slug = empty($title) ? Str::random(16) : Str::slug($title, '-') . '-' . Str::random(5);
            $data->title = $title;
            $data->year = $year;
            $data->content = $content;
            $data->save();
            DB::commit();
            return response()->json(["message" => "Content about successfully added", "code" => 200], 200);
        } catch (\Exception $ex) {
            //throw $th;
            Db::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $lang_id = $request->lang_id;
        $about_page_id = $request->about_page_id;
        $title = empty($request->title) ? null : $request->title;
        $content = $request->content;
        $year = empty($request->year) ? null : $request->year;

        $data = ContentAboutPage::where('id', $id)->first();

        $check = ContentAboutPage::whereRaw("(lang_id = $lang_id AND about_page_id = $about_page_id) 
        AND NOT (lang_id = $data->lang_id AND about_page_id = $data->about_page_id)")->first();

        if ($check && $check->about_page_id != 4) {
            return response()->json(["message" => "Content with section and language input already exist", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $data->about_page_id = $about_page_id;
            $data->lang_id = $lang_id;
            $data->slug = empty($title) ? Str::random(16) : Str::slug($title, '-') . '-' . Str::random(5);
            $data->title = $title;
            $data->year = $year;
            $data->content = $content;
            $data->save();
            DB::commit();
            return response()->json(["message" => "Content about successfully updated", "code" => 200], 200);
        } catch (\Exception $ex) {
            //throw $th;
            Db::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }

    public function destroy(Request $request)
    {
        $cap = ContentAboutPage::where('id', $request->id)->first();
        $cap->delete();

        return response()->json(["message" => "Data Content Abouts successfully deleted", "code" => 200], 200);
    }
}
