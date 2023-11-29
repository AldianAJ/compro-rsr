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

        if ($request->ajax()) {
            $data = DB::table('careers as a')
                ->get();

            return DataTables::of($data)->make(true);
        }
        return view('backend.pages.career.index');
    }

    public function store(Request $request)
    {
        $section = $request->addSection;

        $check = Career::where(
            "section",
            $section
        )->first();
        if ($check) {
            return response()->json(["message" => "Section already exist", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $career = new Career;
            $career->slug = Str::random(16);
            $career->section = $section;
            $career->image = $request->file('addImage')->store('career/images');
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
        $section = $request->editSection;
        $data = Career::where('id', $request->editId)->first();
        $check = Career::where('section', $section)
            ->where('section', '<>', $data->section)
            ->first();
        if ($check) {
            return response()->json(["message" => "Section already exist, please use different", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $data->section = $section;
            $data->slug = Str::random(16);
            if ($request->file('editImage')) {
                $data->image = $request->file('editImage')->store('career/images');
            }
            $data->save();
            DB::commit();
            return response()->json(["message" => "Success updated data careers", "code" => 200], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }
}
