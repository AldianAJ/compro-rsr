<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use App\Models\DescCareer;
use App\Models\Lang;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DescCareerController extends Controller
{
    public function index(Request $request)
    {
        $data['langs'] = Lang::all();
        $data['careers'] = Career::all();
        if ($request->ajax()) {
            $data = DB::table('desc_careers as a')
                ->join('careers as b', 'a.career_id', '=', 'b.id')
                ->join('langs as c', 'a.lang_id', '=', 'c.id')
                ->select('a.*', 'b.section', 'c.language')
                ->get();

            return DataTables::of($data)->make(true);
        }
        return view('backend.pages.desc-career.index', $data);
    }

    public function store(Request $request)
    {
        $career_id = $request->addCareer;
        $lang_id = $request->addLang;
        $content = $request->addContent;

        $check = DescCareer::where(['career_id' => $career_id, 'lang_id' => $lang_id])->first();

        if ($check) {
            return response()->json(["message" => "Content with this section or this language already exist", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $data = new DescCareer;
            $data->career_id = $career_id;
            $data->lang_id = $lang_id;
            $data->content = $content;
            $data->save();
            DB::commit();
            return response()->json(["message" => "Success add new data Description Career", "code" => 200], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }

    public function destroy(Request $request)
    {
        $data = DescCareer::where('id', $request->id)->first();
        $data->delete();

        return response()->json(["message" => "Data Description Careers successfully deleted", "code" => 200], 200);
    }

    public function edit(Request $request)
    {
        $data = DescCareer::where('id', $request->id)->first();

        return response()->json(["data" => $data, "code" => 200], 200);
    }

    public function update(Request $request)
    {
        $career_id = $request->editCareer;
        $lang_id = $request->editLang;
        $content = $request->editContent;
        $data = DescCareer::where('id', $request->editId)->first();
        $check = DescCareer::whereRaw("(career_id = $career_id AND lang_id = '$lang_id') 
        AND NOT (career_id = $data->career_id AND lang_id = '$data->lang_id')")->first();
        if ($check) {
            return response()->json(["message" => "Content with this section or this language already exist, please use different", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $data->career_id = $career_id;
            $data->lang_id = $lang_id;
            $data->content = $content;
            $data->save();
            DB::commit();
            return response()->json(["message" => "Success updated data description career", "code" => 200], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }
}
