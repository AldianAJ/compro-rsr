<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Brand::all();

            return DataTables::of($data)->make(true);
        }
        return view('backend.pages.brand.index');
    }

    public function store(Request $request)
    {
        $brand_name = $request->brand_name;
        $category = $request->category;

        $check = Brand::where(['brand_name' => $brand_name, 'category' => $category])->first();

        if ($check) {
            return response()->json(["message" => "Brand Name already exist", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $brand = new Brand;
            $brand->slug = Str::slug($brand_name, '-') . '-' . Str::random(5);
            $brand->brand_name = $brand_name;
            $brand->category = $category;
            $brand->save();
            DB::commit();
            return response()->json(["message" => "Success add new data brands", "code" => 200], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }

    public function destroy(Request $request)
    {
        $page = Brand::where('id', $request->id)->first();
        $page->delete();

        return response()->json(["message" => "Data Brands successfully deleted", "code" => 200], 200);
    }

    public function edit(Request $request)
    {
        $data = Brand::where('id', $request->id)->first();

        return response()->json(["data" => $data, "code" => 200], 200);
    }

    public function update(Request $request)
    {
        $brand_name = $request->brand_name;
        $category = $request->category;
        $data = Brand::where('id', $request->id)->first();
        $check = Brand::whereRaw("(brand_name = '$brand_name' AND category = '$category') 
        AND NOT (brand_name = '$data->brand_name' AND category = '$data->category')")
            ->first();
        if ($check) {
            return response()->json(["message" => "Brand Name already exit, please use different", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $data->slug = Str::slug($brand_name, '-') . '-' . Str::random(5);
            $data->brand_name = $brand_name;
            $data->category = $category;
            $data->save();
            DB::commit();
            return response()->json(["message" => "Success updated data brands", "code" => 200], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }
}
