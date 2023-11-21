<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data['brands'] = Brand::all();
        if ($request->ajax()) {

            $data = DB::table('products as a')
                ->join('brands as b', 'a.brand_id', '=', 'b.id')
                ->select('a.*', 'b.brand_name')
                ->get();
            return DataTables::of($data)->make(true);
        }

        return view('backend.pages.product.index', $data);
    }

    public function store(Request $request)
    {
        $brand_id = $request->addBrand;
        $product_name = $request->addProduct;

        $check = Product::where([
            "brand_id" => $brand_id,
            "product_name" => $product_name
        ])->first();

        if ($check) {
            return response()->json(["message" => "Product with that brand and name input already exist", "code" => 409], 200);
        }
        // dd($request->file('addImage'));
        DB::beginTransaction();
        try {
            $data = new Product;
            $data->brand_id = $brand_id;
            $data->product_name = $product_name;
            $data->slug = Str::slug($product_name, '-') . '-' . Str::random(5);
            $data->image_url = $request->file('addImage')->store('product/images');
            $data->save();
            DB::commit();
            return response()->json(["message" => "Product successfully added", "code" => 200], 200);
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

        $data = ContentAboutPage::where('id', $id)->first();

        $check = ContentAboutPage::where(function ($q) use ($lang_id, $about_page_id) {
            $q->where('lang_id', $lang_id)
                ->orWhere('about_page_id', $about_page_id);
        })->where(function ($q) use ($data) {
            $q->where('lang_id', '<>', $data->lang_id)
                ->orWhere('about_page_id', '<>', $data->about_page_id);
        })->first();

        if ($check) {
            return response()->json(["message" => "Content with section and language input already exist", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $data->about_page_id = $about_page_id;
            $data->lang_id = $lang_id;
            $data->slug = empty($title) ? Str::random(16) : Str::slug($title, '-') . '-' . Str::random(5);
            $data->title = $title;
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
}
