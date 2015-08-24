<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Repositories\News\NewsRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class NewsCategoryController extends Controller
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
        $category = $this->repository->getNewsCategoryPaginated(config('custom.per_page'), 'id', 'desc');
        $selectedCategory = CategoryService::unlimitedForLevel($category->toArray()['data']);
        return view('backend.news.category', ['category' => $category, 'selectCategory' => $selectedCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::except(['_token']);
        $ret = $this->repository->createCategory($input);
        if ($ret) {
            return Redirect::to('admin/news/category');
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
