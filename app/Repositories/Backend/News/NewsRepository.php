<?php

namespace App\Repositories\Backend\News;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Tag;
use App\Exceptions\GeneralException;
use App\Repositories\Backend\News\NewsContract;

/**
 * Class NewsRepository
 * @package App\Repositories\News
 */
class NewsRepository implements NewsContract
{

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function find($id) {

        $obj = News::findOrNew($id);
        if (! is_null($obj)) return $obj;
        return array();
    }
    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getRolesPaginated($per_page, $order_by = 'id', $sort = 'asc') {
        return News::orderBy($order_by, $sort)->paginate($per_page);
    }

    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getNewsCategoryPaginated($per_page, $order_by = 'id', $sort = 'asc') {
        return NewsCategory::orderBy($order_by, $sort)->paginate($per_page);
    }

    /**
     * @param $per_page
     * @return \Illuminate\Pagination\Paginator
     */
    public function getDeletedUsersPaginated($per_page) {
        return News::onlyTrashed()->paginate($per_page);
    }
    /**
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAllCategory($order_by = 'id', $sort = 'asc') {
        return NewsCategory::orderBy($order_by, $sort)->get();
    }
    /**
     * @param $input
     * @return bool
     */
    public function create($input) {
        $news = NewsCategory::create($input);

        if ($news->save()) {
            return $news;
        }
        return false;
    }
    /**
     * @param $id
     * @param $input
     * @return bool
     */
    public function update($id, $input) {
        $news = $this->find($id);
        return $news->update($input);
    }

    /**
     * @param $id
     * @return bool
     * @throws GeneralException
     */
    public function destroy($id) {
        if (auth()->id() == $id)
            throw new GeneralException("You can not delete yourself.");
        $user = $this->find($id);
        if ($user->delete())
            return true;
        throw new GeneralException("There was a problem deleting this user. Please try again.");
    }
    /**
     * @param $id
     * @return boolean|null
     * @throws GeneralException
     */
    public function delete($id) {
        $user = $this->find($id, true);
        //Detach all roles & permissions
        $user->detachRoles($user->roles);
        $user->detachPermissions($user->permissions);
        try {
            $user->forceDelete();
        } catch (\Exception $e) {
            throw new GeneralException($e->getMessage());
        }
    }
    /**
     * @param $id
     * @return bool
     * @throws GeneralException
     */
    public function restore($id) {
        $user = $this->find($id);
        if ($user->restore())
            return true;
        throw new GeneralException("There was a problem restoring this user. Please try again.");
    }

    /**
     * @param $input
     * @return mixed
     */
    private function createNewsStub($input)
    {
        $news = new News;
        $news->title = $input['title'];
        $news->category_id = $input['category_id'];
        $news->meta_description = $input['meta_description'];
        $news->page_image = $input['page_image'];
        $news->content = $input['content'];
        $news->user_id = $input['user_id'];
        $news->status = isset($input['status']) ?: 0;
        return $news;
    }

    /**
     * @param $input
     * @return bool
     */
    public function createCategory($input) {
        $category = new NewsCategory;
        $category->name = $input['name'];
        $category->pid = $input['pid'];
        return $category->save();
    }

    /**
     * Sync tag relation adding new tags as needed
     *
     * @param array $tags
     */
    public function syncTags(array $tags)
    {
        $news = new News();
        $news->syncTags($tags);
    }
}