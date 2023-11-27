<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutPage;
use App\Models\Brand;
use App\Models\Career;
use App\Models\Content;
use App\Models\ContentAboutPage;
use App\Models\History;
use App\Models\Home;
use App\Models\Lang;
use App\Models\Media;
use App\Models\News;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductPage;
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
        $current_lang = Lang::where('code', $request->lang)->first();

        $about_section_about = AboutPage::where('section', 'About')->first();
        $about_section_vision = AboutPage::where('section', 'Vision')->first();
        $about_section_mission = AboutPage::where('section', 'Mission')->first();
        $about_section_history = AboutPage::where('section', 'History')->first();

        $about_section_about_content = ContentAboutPage::where([
            'about_page_id' => $about_section_about->id,
            'lang_id'       => $current_lang->id
        ])->first();
        $about_section_vision_content = ContentAboutPage::where([
            'about_page_id' => $about_section_vision->id,
            'lang_id'       => $current_lang->id
        ])->first();
        $about_section_mission_content = ContentAboutPage::where([
            'about_page_id' => $about_section_mission->id,
            'lang_id'       => $current_lang->id
        ])->first();
        $about_section_history_content = ContentAboutPage::where([
            'about_page_id' => $about_section_history->id,
            'lang_id'       => $current_lang->id
        ])->get();

        return view('frontend.pages.about.index', [
            'about_section_about_content' => $about_section_about_content,
            'about_section_vision_content' => $about_section_vision_content,
            'about_section_mission_content' => $about_section_mission_content,
            'about_section_history_content' => $about_section_history_content,
        ]);
    }

    public function products(Request $request)
    {
        $current_lang = Lang::where('code', $request->lang)->first();
        $brands = Brand::get();
        $products = Product::get();

        $product_section = ProductPage::where('lang_id', $current_lang->id)->first();

        return view('frontend.pages.products.index', [
            'brands' => $brands,
            'products' => $products,
            'product_section' => $product_section
        ]);
    }

    public function media()
    {
        $medias = Media::get();
        return view('frontend.pages.media.index', [
            'medias' => $medias
        ]);
    }

    public function career(Request $request)
    {
        $current_lang = Lang::where('code', $request->lang)->first();

        $career_section = Career::where('lang_id', $current_lang->id)->first();
        return view('frontend.pages.career.index', [
            'career_section' => $career_section
        ]);
    }
}
