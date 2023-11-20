<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Brand;
use App\Models\Content;
use App\Models\History;
use App\Models\Home;
use App\Models\Lang;
use App\Models\News;
use App\Models\Page;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('frontend.pages.home.index');
    }

    public function about(Request $request)
    {
        $page_about_us = Page::find(1);
        $current_lang = Lang::where('code', $request->lang)->first();

        $section_visi_misi = Section::where([
            'page_id' => $page_about_us->id,
            'section' => 'Visi Misi'
        ])->first();
        $section_visi_misi_content = Content::where([
            'section_id' => $section_visi_misi->id,
            'lang_id' => $current_lang->id
        ])->get();

        return view('frontend.pages.about.index', [
            'section_visi_misi_content' => $section_visi_misi_content
        ]);
    }

    public function products()
    {
        return view('frontend.pages.products.index');
    }

    public function media()
    {
        return view('frontend.pages.media.index');
    }

    public function career()
    {
        return view('frontend.pages.career.index');
    }
}
