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
        $data['langs'] = Lang::all();
        $data['about_pages'] = AboutPage::all();
        if ($request->ajax()) {
            $data = DB::table('about_pages as a')
                ->join('content_about_pages as b', 'a.id', '=', 'b.about_page_id')
                ->join('langs as c', 'b.lang_id', '=', 'c.id')
                ->select('a.id as about_page_id', 'a.slug as slug_about_page', 'a.image', 'a.section', 'c.code', 'c.language', 'b.id as content_about_id', 'b.slug as content_about_slug', 'b.title', 'b.content')
                ->get();
            return DataTables::of($data)->make(true);
        }

        return view('backend.pages.about-page.index', $data);
    }
}
