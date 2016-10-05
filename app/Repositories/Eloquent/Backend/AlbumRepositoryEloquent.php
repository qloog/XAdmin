<?php

namespace App\Repositories\Eloquent\Backend;

use App\Models\AlbumPhoto;
use Auth;
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

    /**
     * 上传并存储照片
     *
     * @param       $albumId
     * @param array $photo
     * @return array
     */
    public function storePhoto($albumId, array $photo = [])
    {
        if (!$albumId || !$photo) {
            return [];
        }

        $photoModel = new AlbumPhoto();
        $photoModel->origin_name = $photo['origin_name'];
        $photoModel->path = $photo['image_path'];
        $photoModel->album_id = $albumId;
        $photoModel->user_id = Auth::id();
        $ret = $photoModel->save();

        return $ret ? $photo : [];
    }
}
