<?php

namespace App\Repositories\Backend\Event;

use App\Models\Event;

class EventRepository
{

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function find($id) {
        $event = Event::find($id);
        if (! is_null($event)) return $event;
        return array();
    }

    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAll($per_page, $order_by = 'id', $sort = 'desc') {
        return Event::orderBy($order_by, $sort)->paginate($per_page);
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
        return User::onlyTrashed()->paginate($per_page);
    }

    /**
     * @param $input
     * @return bool
     */
    public function create($input) {
        $obj = Event::create($input);

        if ($obj->save()) {
            return $obj;
        }
        return false;
    }
    /**
     * @param $id
     * @param $input
     * @return bool
     */
    public function update($id, $input) {
        $obj = $this->find($id);
        return $obj->update($input);
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

}