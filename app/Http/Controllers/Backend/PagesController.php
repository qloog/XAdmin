<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Page;
use Redirect, Input, Auth;

class PagesController extends baseController
{

    public function __construct()
    {

    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $page = Page::where('slug', '=', 'overview')->first();
        $gallery = Page::where('slug', '=', 'gallery')->first();
        $images = explode(',', $gallery->content);
        return view('backend.pages.index', ['page' => $page, 'gallery' => $gallery, 'images' => $images]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('admin.pages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
        $this->validate($request, [
            'ueditor' => 'required',
        ]);


        $page = new Page;
        $page->content = Input::get('editor');
        $page->user_id = Auth::user()->id;

        if ($page->save()) {
            return Redirect::to('admin/page');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        //
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        return view('admin.pages.edit')->withPage(Page::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
        $this->validate($request, [
            'ueditor' => 'required',
        ]);

        $page = Page::find($id);
        $page->content = Input::get('ueditor');
        $page->user_id = Auth::user()->id;

        if ($page->save()) {
            return Redirect::to('admin/page');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        $page = Page::find($id);
        $page->delete();

        return Redirect::to('admin/page');
	}

}
