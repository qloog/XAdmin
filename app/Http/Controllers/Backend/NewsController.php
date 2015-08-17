<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\Backend\News\NewsRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Backend\NewsRequest;
use App\Services\Category;
use App\Models\News;
use Auth, Log;
use App\Jobs\NewsFormFields;
use App\Http\Requests\Backend\NewsCreateRequest;
use App\Http\Requests\Backend\NewsUpdateRequest;

class NewsController extends BaseController
{

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
        $news = $this->repository->getNewsPaginated(config('custom.per_page'), 'id', 'desc');
        return view('backend.news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = $this->dispatch(new NewsFormFields());
        $category = $this->repository->getAllCategory();
        $data['selectCategory'] = Category::unlimitedForLevel($category->toArray());

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
        if ($news = $this->repository->create($request->newsFillData())) {
            trim(Input::get('tags')) &&  $news->syncTags(array_map('trim', explode(',', Input::get('tags'))));
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
        $news = $this->repository->findOrThrowException($id);
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
        $data = $this->dispatch(new NewsFormFields($id));
        $category = $this->repository->getAllCategory();
        $data['selectCategory'] = Category::unlimitedForLevel($category->toArray());
        //print_r($data);exit;
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
        $news = News::findOrNew($id);
        if ($this->repository->update($id, $request->newsFillData())) {
            Log::info('update...'. Input::get('tags'));
            $tags = Input::get('tags') ? array_map('trim', explode(',', Input::get('tags'))) : [];
            $news->syncTags($tags);
            return Redirect::to('admin/news');
        } else {
            //return Redirect::back()->withInput()->withErrors('保存失败！');
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
        $news = $this->repository->findOrThrowException($id);
        $news->tags()->detach();
        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->withSuccess('Post deleted.');
    }
}
