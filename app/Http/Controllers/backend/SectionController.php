<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $data['pages'] = Page::all();
        if ($request->ajax()) {
            $data = DB::table('sections as a')
                ->join('pages as b', 'a.page_id', '=', 'b.id')
                ->select('a.*', 'b.page_name');

            if (isset($request->search_pages)) {
                $data = $data->where('a.page_id', $request->search_pages)->get();
            }

            return DataTables::of($data)->make(true);
        }
        return view('backend.pages.section.index', $data);
    }

    public function store(Request $request)
    {
        $page = $request->page;
        $section_name = $request->section_name;

        $check = Section::where(['page_id' => $page, 'section' => $section_name])->first();
        $pages = Page::where('id', $page)->first();
        if ($check) {
            return response()->json(["message" => "Section name already exist in page $pages->page_name", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $section = new Section;
            $section->page_id = $page;
            $section->section = $section_name;
            $section->save();
            DB::commit();
            return response()->json(["message" => "Success add new data section", "code" => 200], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }

    public function destroy(Request $request)
    {
        $page = Section::where('id', $request->id)->first();
        $page->delete();

        return response()->json(["message" => "Data sections successfully deleted", "code" => 200], 200);
    }

    public function edit(Request $request)
    {
        $data = Section::where('id', $request->id)->first();

        return response()->json(["data" => $data, "code" => 200], 200);
    }

    public function update(Request $request)
    {
        $page = $request->page;
        $data = Section::where('id', $request->id)->first();
        $check = Section::where(['section' => $request->section_name, "page_id" => $page])
            ->where('section', '<>', $data->section)
            ->first();
        $pages = Page::where('id', $page)->first();

        if ($check) {
            return response()->json(["message" => "Section name already exit in page $pages->page_name, please use different", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $data->page_id = $page;
            $data->section = $request->section_name;
            $data->save();
            DB::commit();
            return response()->json(["message" => "Success updated data sections", "code" => 200], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }
}
