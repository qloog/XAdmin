<?php

namespace App\Repositories\Eloquent\Backend;

use App\Exceptions\GeneralException;
use App\Models\AlbumPhoto;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\Backend\AlbumRepository;
use App\Models\Album;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories\Eloquent\Backend;
 */
class AlbumRepositoryEloquent extends BaseRepository implements AlbumRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Album::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function photos($albumId)
    {
        // return $this->model()->photos()->paginate();
    }
}
