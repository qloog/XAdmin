<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\Backend\News\NewsRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Backend\NewsRequest;
use App\Services\UploadsManager;
use App\Services\Category;
use App\Models\News;
use Auth, Log;

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
        $category = $this->repository->getAllCategory();
        $selectedCategory = Category::unlimitedForLevel($category->toArray());
        $status = array(
            '1' => '已发布',
            '2' => '草稿',
            '3' => '已删除'
        );
        return view('backend.news.create', ['selectCategory' => $selectedCategory, 'status' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsRequest    $request
     * @param UploadsManager $manager
     * @return Response
     */
    public function store(NewsRequest $request, UploadsManager $manager)
    {
        if ($file = Input::file('page_image')) {
            $data['filename'] = $manager->uploadImage($file);
        } else {
            $data['error'] = 'Error while uploading file';
        }

        $input = Input::all();
        $input['page_image'] = $data['filename'];
        $input['user_id'] = Auth::user()->id;
        if ($news = $this->repository->create($input)) {
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
        $news = $this->repository->findOrThrowException($id);
        return view('backend.news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();
        $input['content'] = Input::get('ueditor');
        $news = News::findOrNew($id);
        if ($this->repository->update($id, $input)) {
            Log::info('update...'. Input::get('tags'));
            $tags = Input::get('tags') ? array_map('trim', explode(',', Input::get('tags'))) : [];
            $news->syncTags($tags);
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
        $news = $this->repository->findOrThrowException($id);
        $news->tags()->detach();
        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->withSuccess('Post deleted.');
    }
}
