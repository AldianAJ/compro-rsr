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
            if (isset($request->id)) {
                $data = Product::where('id', $request->id)->first();

                return response()->json(["data" => $data, "code" => 200], 200);
            }

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

        DB::beginTransaction();
        try {
            $data = new Product;
            $data->brand_id = $brand_id;
            $data->product_name = $product_name;
            $data->slug = Str::slug($product_name, '-') . '-' . Str::random(5);
            $data->image_url = $request->file('addImage')->store('product/images', ['disk' => 'public']);
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
        $id = $request->editId;
        $brand_id = $request->editBrand;
        $product_name = $request->editProduct;

        $data = Product::where('id', $id)->first();
        $check = Product::where([
            "brand_id" => $brand_id,
            "product_name" => $product_name
        ], [
            ['brand_id', '<>', $data->brand_id],
            ['product_name', '<>', $data->product_name]
        ])->first();

        if ($check) {
            return response()->json(["message" => "Product with that brand and name input already exist", "code" => 409], 200);
        }

        DB::beginTransaction();
        try {
            $data->brand_id = $brand_id;
            $data->product_name = $product_name;
            $data->slug = Str::slug($product_name, '-') . '-' . Str::random(5);
            if ($request->file('editImage')) {
                $data->image_url = $request->file('editImage')->store('product/images');
            }
            $data->save();
            DB::commit();
            return response()->json(["message" => "Product successfully updated", "code" => 200], 200);
        } catch (\Exception $ex) {
            //throw $th;
            Db::rollBack();
            return response()->json(["message" => $ex->getMessage(), "code" => 500], 200);
        }
    }

    public function destroy(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $product->delete();

        return response()->json(["message" => "Data Products successfully deleted", "code" => 200], 200);
    }
}
