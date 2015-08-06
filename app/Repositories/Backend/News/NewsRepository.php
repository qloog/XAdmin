<?php

namespace App\Repositories\Backend\News;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Tags;
use App\Exceptions\GeneralException;

/**
 * Class NewsRepository
 * @package App\Repositories\Backend\News
 */
class NewsRepository
{
    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id) {
        $news = News::find($id);
        if (! is_null($news)) return $news;
        return array();
    }
    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @param int $status
     * @return mixed
     */
    public function getNewsPaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc') {
        return News::where('status', $status)->orderBy($order_by, $sort)->paginate($per_page);
    }

    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @param int $status
     * @return mixed
     */
    public function getNewsCategoryPaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc') {
        return NewsCategory::orderBy($order_by, $sort)->paginate($per_page);
    }

    /**
     * @param $per_page
     * @return \Illuminate\Pagination\Paginator
     */
    public function getDeletedUsersPaginated($per_page) {
        return User::onlyTrashed()->paginate($per_page);
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
        $news = $this->createNewsStub($input);

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
        $news = $this->findOrThrowException($id);
        return $news->update($input);
    }
    /**
     * @param $id
     * @param $input
     * @return bool
     * @throws GeneralException
     */
    public function updatePassword($id, $input) {
        $user = $this->findOrThrowException($id);
        //Passwords are hashed on the model
        $user->password = $input['password'];
        if ($user->save())
            return true;
        throw new GeneralException('There was a problem changing this users password. Please try again.');
    }
    /**
     * @param $id
     * @return bool
     * @throws GeneralException
     */
    public function destroy($id) {
        if (auth()->id() == $id)
            throw new GeneralException("You can not delete yourself.");
        $user = $this->findOrThrowException($id);
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
        $user = $this->findOrThrowException($id, true);
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
        $user = $this->findOrThrowException($id);
        if ($user->restore())
            return true;
        throw new GeneralException("There was a problem restoring this user. Please try again.");
    }
    /**
     * @param $id
     * @param $status
     * @return bool
     * @throws GeneralException
     */
    public function mark($id, $status) {
        if (auth()->id() == $id && ($status == 0 || $status == 2))
            throw new GeneralException("You can not do that to yourself.");
        $user = $this->findOrThrowException($id);
        $user->status = $status;
        if ($user->save())
            return true;
        throw new GeneralException("There was a problem updating this user. Please try again.");
    }
    /**
     * Check to make sure at lease one role is being applied or deactivate user
     * @param $user
     * @param $roles
     * @throws UserNeedsRolesException
     */
    private function validateRoleAmount($user, $roles) {
        //Validate that there's at least one role chosen, placing this here so
        //at lease the user can be updated first, if this fails the roles will be
        //kept the same as before the user was updated
        if (count($roles) == 0) {
            //Deactivate user
            $user->status = 0;
            $user->save();
            $exception = new UserNeedsRolesException();
            $exception->setValidationErrors('You must choose at lease one role. User has been created but deactivated.');
            //Grab the user id in the controller
            $exception->setUserID($user->id);
            throw $exception;
        }
    }
    /**
     * @param $input
     * @param $user
     * @throws GeneralException
     */
    private function checkUserByEmail($input, $user)
    {
        //Figure out if email is not the same
        if ($user->email != $input['email'])
        {
            //Check to see if email exists
            if (User::where('email', '=', $input['email'])->first())
                throw new GeneralException('That email address belongs to a different user.');
        }
    }
    /**
     * @param $roles
     * @param $user
     */
    private function flushRoles($roles, $user)
    {
        //Flush roles out, then add array of new ones
        $user->detachRoles($user->roles);
        $user->attachRoles($roles['assignees_roles']);
    }
    /**
     * @param $permissions
     * @param $user
     */
    private function flushPermissions($permissions, $user)
    {
        //Flush permissions out, then add array of new ones if any
        $user->detachPermissions($user->permissions);
        if (count($permissions['permission_user']) > 0)
            $user->attachPermissions($permissions['permission_user']);
    }
    /**
     * @param $roles
     * @throws GeneralException
     */
    private function checkUserRolesCount($roles)
    {
        //User Updated, Update Roles
        //Validate that there's at least one role chosen
        if (count($roles['assignees_roles']) == 0)
            throw new GeneralException('You must choose at least one role.');
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