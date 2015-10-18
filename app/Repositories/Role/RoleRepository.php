<?php namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\AbstractRepository;

class RoleRepository extends AbstractRepository implements RoleContract
{

    /**
     * Create a new DbUserRepository instance.
     * @param Role $album
     */
    public function __construct(Role $album)
    {
        $this->model = $album;
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
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
     * @return \Illuminate\Pagination\Paginator
     */
    public function getAll($per_page, $order_by = 'id', $sort = 'desc') {
        return $this->model->orderBy($order_by, $sort)->paginate($per_page);
    }

}
