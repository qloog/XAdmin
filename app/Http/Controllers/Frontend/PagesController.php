<?php namespace App\Http\Controllers;

use App\Page;

class PagesController extends Controller {

  public function show($id)
  {
    return view('frontend.pages.show')->withPage(Page::find($id));
  }

}
