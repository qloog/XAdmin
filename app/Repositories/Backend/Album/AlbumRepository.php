<?php

namespace App\Repositories\Backend\Album;

use App\Models\Album;

class AlbumRepository
{

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function find($id) {
        $obj = Album::find($id);
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
        return Album::orderBy($order_by, $sort)->paginate($per_page);
    }

    /**
     * @param $input
     * @return bool
     */
    public function create($input) {
        $obj = Album::create($input);
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