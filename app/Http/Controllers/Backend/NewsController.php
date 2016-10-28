<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\NewsRepository;
use App\Contracts\Repositories\NewsCategoryRepository;
use Illuminate\Support\Facades\Redirect;
use App\Services\CategoryService;
use App\Http\Requests\Backend\NewsCreateRequest;
use App\Http\Requests\Backend\NewsUpdateRequest;

/**
 * Class NewsController
 * @package App\Http\Controllers\Backend
 */
class NewsController extends BaseController
{

    /**
     * @var NewsRepository
     */
    protected $news;

    /**
     * @var NewsCategoryRepository
     */
    protected $category;

    public function __construct(NewsRepository $news, NewsCategoryRepository $category)
    {
        $this->news = $news;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = $this->news->orderBy('id', 'desc')->paginate(10);
        return view('backend.news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = [];
        //$data = $this->dispatch(new NewsFormFields());
        $data = [
            'page_image' => '',
            'content' => ''
        ];
        $category = $this->category->all();
        $data['selectCategory'] = CategoryService::unlimitedForLevel($category->toArray());

        return view('backend.news.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsCreateRequest    $request
     * @return Response
     */
    public function store(NewsCreateRequest $request)
    {
        if ($news = $this->news->create($request->newsFillData())) {
            return Redirect::to('admin/news');
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
        $news = $this->news->find($id);
        print_r($news->category->name);exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data['news'] = $this->news->find($id);

        $categories = $this->category->all();
        $data['selectCategory'] = CategoryService::unlimitedForLevel($categories->toArray());

        return view('backend.news.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsUpdateRequest $request
     * @param  int  $id
     * @return Response
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        if ($this->news->update($request->newsFillData(), $id)) {
            // Log::info('update...'. Input::get('tags'));
            // $tags = Input::get('tags') ? array_map('trim', explode(',', Input::get('tags'))) : [];
            // $news->syncTags($tags);
            return Redirect::to('admin/news');
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
        $news = $this->repository->find($id);
        $news->tags()->detach();
        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->withSuccess('Post deleted.');
    }
}
