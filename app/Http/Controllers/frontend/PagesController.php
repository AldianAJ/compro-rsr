<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Brand;
use App\Models\History;
use App\Models\Home;
use App\Models\News;
use App\Models\Product;

class PagesController extends Controller
{
    public function home()
    {
        return view('frontend.pages.home.index');
    }

    public function about()
    {
        $section_visi = About::where('section', 'Visi')->first();
        $section_misi = About::where('section', 'Misi')->first();
        $section_budaya_kerja = About::where('section', 'Budaya Kerja')->first();
        $section_histori = History::get();

        return view('frontend.pages.about.index', compact(
            'section_visi',
            'section_misi',
            'section_budaya_kerja',
            'section_histori',
        ));
    }

    public function brand($slug)
    {
        $merk = Brand::where('slug', $slug)->first();
        $produk = Product::where('brand_id', $merk->id)->paginate(6);
        $section_produk = Home::where('section', 'Produk')->first();

        return view('frontend.pages.brand.index', compact(
            'merk',
            'produk',
            'section_produk'
        ));
    }

    public function news()
    {
        $berita = News::latest()->paginate(9);

        return view('frontend.pages.news.index', compact(
            'berita'
        ));
    }

    public function career()
    {
        return view('frontend.pages.career.index');
    }
}
