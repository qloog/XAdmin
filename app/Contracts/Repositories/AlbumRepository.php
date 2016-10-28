<?php

namespace App\Contracts\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository
 * @package namespace App\Contracts\Repositories\Backend;
 */
interface AlbumRepository extends RepositoryInterface
{

    /**
     * 保存相册图片
     *
     * @param       $albumId
     * @param array $data
     * @return mixed
     */
    public function storePhoto($albumId, array $data = []);

}
