<?php namespace App\Http\Controllers\Frontend;

use App\Models\Page;

use App\Http\Controllers\Controller;

class PagesController extends Controller {

    public function show($id)
    {
        return view('frontend.pages.show')->withPage(Page::find($id));
    }

    public function overview()
    {
        return view('frontend.pages.detail')->withPage(Page::find(1));
    }

    public function video()
    {
        return view('frontend.pages.video');
    }

    public function gallery()
    {
        $gallery = Page::where('slug', '=', 'gallery')->first();
        $images = explode(',', $gallery->content);
        return view('frontend.pages.gallery', ['images' => $images]);
    }

    public function route()
    {
        return view('frontend.pages.route');
    }

}
