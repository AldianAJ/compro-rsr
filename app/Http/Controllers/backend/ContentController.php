<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Lang;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        $data['langs'] = Lang::all();
        $data['pages'] = Page::all();
        if ($request->ajax()) {

            if (isset($request->page_id)) {
                $sections = Section::where('page_id', $request->page_id)->get();

                return response()->json(["data" => $sections, "code" => 200], 200);
            }

            $data = DB::table('contents as a')
                ->join('langs as b', 'a.lang_id', '=', 'b.id')
                ->join('sections as c', 'a.section_id', '=', 'c.id')
                ->join('pages as d', 'c.page_id', '=', 'd.id')
                ->select('a.*', 'b.language', 'c.section', 'd.page_name')
                ->get();

            return DataTables::of($data)->make(true);
        }
        return view('backend.pages.content.index', $data);
    }

    public function store(Request $request)
    {
        $lang_id = $request->lang_id;
        $section_id = $request->section;
        $title = $request->title;
        $content_value = $request->content;

        $check = Content::where(['section_id' => $section_id, 'lang_id' => $lang_id])->first();

        // if ($check) {
        //     return response()->json(["message" => "Content with that language already exist in that content", "code" => 409], 200);
        // }

        DB::beginTransaction();
        try {
            $content = new Content;
            $content->lang_id = $lang_id;
            $content->section_id = $section_id;
            $content->title = $title;
            $content->content_value = $content_value;
            $content->save();
            DB::commit();
            return response()->json(["message" => "Success add new data contents", "code" => 200], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }

    public function destroy(Request $request)
    {
        $page = Lang::where('id', $request->id)->first();
        $page->delete();

        return response()->json(["message" => "Data Languages successfully deleted", "code" => 200], 200);
    }

    public function edit(Request $request)
    {
        $data = Lang::where('id', $request->id)->first();

        return response()->json(["data" => $data, "code" => 200], 200);
    }

    public function update(Request $request)
    {
        $code = $request->code;
        $language = $request->language;
        $data = Lang::where('id', $request->id)->first();
        $check = Lang::where(function ($q) use ($code, $language) {
            $q->where('code', $code)
                ->orWhere('language', $language);
        })
            ->where(function ($q) use ($data) {
                $q->where('code', '<>', $data->code)
                    ->orWhere('language', '<>', $data->language);
            })
            ->first();
        if ($check) {
            return response()->json(["message" => "Language or Code already exit, please use different", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $data->code = $code;
            $data->language = $language;
            $data->save();
            DB::commit();
            return response()->json(["message" => "Success updated data languages", "code" => 200], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }
}
