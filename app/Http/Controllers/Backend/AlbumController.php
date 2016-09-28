<?php

namespace App\Http\Controllers\Backend;

use App\Services\UploadsManager;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Contracts\Repositories\Backend\AlbumRepository;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Redirect;
use Symfony\Component\HttpFoundation\File\File;

class AlbumController extends BaseController
{
    protected $album;
    protected $manage;

    public function __construct(AlbumRepository $album, UploadsManager $manager)
    {
        $this->album = $album;
        $this->manage = $manager;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = $this->album->paginate(config('custom.per_page'));

        return view('backend.album.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($this->album->create($request->all())) {
            return redirect()->route('admin.album.index');
        }
        return Redirect::back()->withInput()->withErrors('保存失败！');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $album = $this->album->find($id);

        return view('backend.album.edit', ['album' => $album]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int    $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if ($this->album->update($request->all(), $id)) {
            return redirect()->route('admin.album.index');
        }
        return Redirect::back()->withInput()->withErrors('保存失败！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $this->album->delete($id);

        return redirect()
            ->route('admin.album.index')
            ->withSuccess('Post deleted.');
    }

    /**
     * 上传图片
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function photos($id)
    {

        $album = $this->album->find($id);

        $photos = $album->photos()->paginate(9);

        return view('backend.album.photos', ['album' => $album, 'photos' => $photos]);
    }

    /**
     * 保存图片
     */
    public function storePhoto()
    {

        $imageInfo = $this->manage->uploadImage(Input::file('file'));

        $albumId = Input::get('id');

        $ret = $this->album->storePhoto($albumId, $imageInfo);

        if ($ret) {
            return redirect()->to('admin/album/' . $albumId . '/photos')->withSuccess('保存成功');
        } else {
            return redirect()->to('admin/album/' . $albumId . '/photos')->withSuccess('保存失败');
        }
    }
}
