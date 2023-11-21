<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AboutPageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = AboutPage::all();
            return DataTables::of($data)->make(true);
        }

        return view('backend.pages.about-page.index');
    }
}
