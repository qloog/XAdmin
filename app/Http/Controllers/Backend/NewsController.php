<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\Backend\News\NewsRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class NewsController extends BaseController
{

    private $repository;

    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = $this->repository->getNewsPaginated(config('custom.per_page'), 1, 'id', 'desc');

        return view('backend.news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $ret = $this->repository->create(Input::all());
        if (!$ret) {
            return Redirect::to('admin/news');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
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
    }
}
