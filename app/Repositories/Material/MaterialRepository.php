<?php

namespace App\Repositories\Material;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class MaterialRepository extends Repository {

    public function model() {
        return 'App\Models\Material';
    }

}