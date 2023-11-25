<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        $data['langs'] = Lang::all();
        if ($request->ajax()) {
            $data = DB::table('careers as a')
                ->join('langs as b', 'a.lang_id', '=', 'b.id')
                ->select('a.*', 'b.language')
                ->get();

            return DataTables::of($data)->make(true);
        }
        return view('backend.pages.career.index', $data);
    }

    public function store(Request $request)
    {
        $content = $request->content;
        $lang_id = $request->lang_id;

        $check = Career::where(
            "lang_id",
            $lang_id
        )->first();
        if ($check) {
            return response()->json(["message" => "Content with that language already exist", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $career = new Career;
            $career->lang_id = $lang_id;
            $career->slug = Str::random(16);
            $career->content = $content;
            $career->save();
            DB::commit();
            return response()->json(["message" => "Success add new data careers", "code" => 200], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }

    public function destroy(Request $request)
    {
        $career = Career::where('id', $request->id)->first();
        $career->delete();

        return response()->json(["message" => "Data Careers successfully deleted", "code" => 200], 200);
    }

    public function edit(Request $request)
    {
        $data = Career::where('id', $request->id)->first();

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
