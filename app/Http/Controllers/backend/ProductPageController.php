<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Models\ProductPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ProductPageController extends Controller
{
    public function index(Request $request)
    {
        $data['langs'] = Lang::all();
        if ($request->ajax()) {

            if (isset($request->id)) {
                $data = ProductPage::where('id', $request->id)->first();

                return response()->json(["data" => $data, "code" => 200], 200);
            }

            $data = DB::table('product_pages as a')
                ->join('langs as b', 'a.lang_id', '=', 'b.id')
                ->select('a.*', 'b.code', 'b.language')
                ->get();

            return DataTables::of($data)->make(true);
        }

        return view('backend.pages.product-page.index', $data);
    }

    public function store(Request $request)
    {
        $lang_id = $request->lang_id;
        $content = $request->content;

        $check = ProductPage::where("lang_id", $lang_id,)->first();

        if ($check) {
            return response()->json(["message" => "Content with language input already exist", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $data = new ProductPage();
            $data->slug = Str::random(16);
            $data->lang_id = $lang_id;
            $data->content = $content;
            $data->save();
            DB::commit();
            return response()->json(["message" => "Content product successfully added", "code" => 200], 200);
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
        $content = $request->content;

        $data = ProductPage::where('id', $id)->first();

        $check = ProductPage::where('lang_id', $lang_id)
            ->where('lang_id', '<>', $data->lang_id)
            ->first();

        if ($check) {
            return response()->json(["message" => "Product with language input already exist", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $data->slug = Str::random(16);
            $data->lang_id = $lang_id;
            $data->content = $content;
            $data->save();
            DB::commit();
            return response()->json(["message" => "Content product successfully updated", "code" => 200], 200);
        } catch (\Exception $ex) {
            //throw $th;
            Db::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }
}
