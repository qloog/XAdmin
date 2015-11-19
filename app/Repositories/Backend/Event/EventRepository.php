<?php

namespace App\Repositories\Event;

use App\Models\Event;
use App\Repositories\AbstractRepository;

class EventRepository extends AbstractRepository implements EventContract
{

    /**
     * Create a new EventRepository instance.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id) {
        $obj = $this->model->findOrNew($id);
        if (! is_null($obj)) return $obj;
        return array();
    }

    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAll($per_page, $order_by = 'id', $sort = 'desc') {
        return $this->model->orderBy($order_by, $sort)->paginate($per_page);
    }

    /**
     * @param $per_page
     * @return \Illuminate\Pagination\Paginator
     */
    public function getDeletedUsersPaginated($per_page) {
        return $this->model->onlyTrashed()->paginate($per_page);
    }

    /**
     * @param $input
     * @return bool
     */
    public function create($input) {
        $obj = $this->model->create($input);
        return $obj->save() ? $obj : false;
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
     * @return boolean|null
     * @throws GeneralException
     */
    public function delete($id) {
        $obj = $this->find($id);
        try {
            $obj->forceDelete();
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

}