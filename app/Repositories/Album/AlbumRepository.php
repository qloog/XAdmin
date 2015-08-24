<?php

namespace App\Repositories\Album;

use App\Models\Album;
use App\Repositories\AbstractRepository;

class AlbumRepository extends AbstractRepository implements AlbumContract
{

    /**
     * Create a new DbUserRepository instance.
     * @param Album $album
     */
    public function __construct(Album $album)
    {
        $this->model = $album;
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function find($id) {
        $obj = $this->model->find($id);
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
}