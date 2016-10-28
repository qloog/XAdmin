<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\NewsCategoryCreateRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Contracts\Repositories\NewsCategoryRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class NewsCategoryController extends Controller
{

    private $repository;

    public function __construct(NewsCategoryRepository $repository)
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
        $categories = $this->repository->orderBy('id', 'desc')->paginate(15);
        $selectedCategory = CategoryService::unlimitedForLevel($categories->toArray()['data']);

        return view('backend.news.category', [
            'categories' => $categories,
            'selectCategory' => $selectedCategory,
            'category' => ['id' => 0, 'name' => '', 'pid' => 0, 'html' => '', 'level' => 0]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return bool
     * @internal param NewsCategoryCreateRequest $request
     */
    public function create()
    {
        $categories = $this->repository->all();
        $data['selectCategory'] = CategoryService::unlimitedForLevel($categories->toArray());
        $data['category'] = [
            'id' => 0,
            'name' => ''
        ];

        return view('backend.news.category_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsCategoryCreateRequest $request
     * @return Response
     */
    public function store(NewsCategoryCreateRequest $request)
    {
        if ($this->repository->create($request->categoryFillData())) {
            return Redirect::to('admin/news/category');
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
        $categories = $this->repository->orderBy('id', 'desc')->paginate(15);
        $selectedCategory = CategoryService::unlimitedForLevel($categories->toArray()['data']);

        $category = $this->repository->find($id);

        return view('backend.news.category_edit', ['category' => $category, 'selectCategory' => $selectedCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int    $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if ($this->repository->update($request->all(), $id)) {
            return Redirect::to('admin/news/category');
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
    }
}
