<?php

namespace App\Repositories\Backend\User;

/**
 * Interface UserContract
 * @package App\Repositories\Backend\User
 */
interface UserContract
{

    /**
     * @param            $id
     * @param bool|false $withRoles
     * @return mixed
     */
    public function find($id, $withRoles = false);

    /**
     * @param        $per_page
     * @param        $status
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getUsersPaginated($per_page, $status, $order_by = 'id', $sort = 'desc');

    /**
     * @param $per_page
     * @return mixed
     */
    public function getDeletedUsersPaginated($per_page);

    /**
     * @param string $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAllUsers($per_page, $order_by = 'id', $sort = 'asc');

    /**
     * @param $input
     * @param $roles
     * @return mixed
     */
    public function create($input, $roles);

    /**
     * @param $id
     * @param $input
     * @param $roles
     * @return mixed
     */
    public function update($id, $input, $roles);

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function updatePassword($id, $input);

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $id
     * @return mixed
     */
    public function restore($id);

    /**
     * @param $id
     * @param $status
     * @return mixed
     */
    public function mark($id, $status);

}
