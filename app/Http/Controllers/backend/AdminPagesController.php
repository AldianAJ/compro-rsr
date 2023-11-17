<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AdminPagesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Page::all();

            return DataTables::of($data)->make(true);
        }
        return view('backend.pages.admin-page.index');
    }

    public function store(Request $request)
    {
        $page_name = $request->page;

        $check_page = Page::where('page_name', $page_name)->first();

        if ($check_page) {
            return response()->json(["message" => "Page name already exist", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $page = new Page;
            $page->page_name = $page_name;
            $page->save();
            DB::commit();
            return response()->json(["message" => "Success add new data pages", "code" => 200], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }

    public function destroy(Request $request)
    {
        $page = Page::where('id', $request->id)->first();
        $page->delete();

        return response()->json(["message" => "Data pages successfully deleted", "code" => 200], 200);
    }

    public function edit(Request $request)
    {
        $data = Page::where('id', $request->id)->first();

        return response()->json(["data" => $data, "code" => 200], 200);
    }

    public function update(Request $request)
    {
        $page_name = $request->page;
        $data = Page::where('id', $request->id)->first();
        $check = Page::where('page_name', $page_name)
            ->where('page_name', '<>', $data->page_name)
            ->first();

        if ($check) {
            return response()->json(["message" => "Page name already exit, please use different", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $data->page_name = $page_name;
            $data->save();
            DB::commit();
            return response()->json(["message" => "Success updated data pages", "code" => 200], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }
}
