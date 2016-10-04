<?php

namespace App\Repositories\Eloquent\Backend;

use App\Exceptions\GeneralException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\Backend\UserRepository;
use App\Models\User;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories\Eloquent\Backend;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * 创建新用户
     *
     * @param array $input
     * @return bool
     * @throws GeneralException
     */
    public function create(array $input)
    {
        if (isset($input['assignees_roles']) && count($input['assignees_roles']) == 0) {
            throw new GeneralException('You must select at least one role for this user.');
        }

        $user = new User;
        $user->username = $input['username'];
        $user->email = $input['email'];
        //$user->password = $input['password'];
        $user->status = isset($input['status']) ? 1 : 0;
        //$user->confirmation_code = md5(uniqid(mt_rand(), true));
        //$user->confirmed = isset($input['confirmed']) ? 1 : 0;
        if ($user->save()) {
            //Attach new roles
            $user->attachRoles($input['assignees_roles']);
            return true;
        }
        throw new GeneralException('There was a problem creating this user. Please try again.');
    }

    /**
     * 更新用户
     *
     * @param array $input
     * @param       $id
     * @return bool
     * @throws GeneralException
     * @internal param $roles
     */
    public function update(array $input, $id)
    {
        $user = User::find($id);
        $this->checkUserByEmail($input, $user);
        $roles['assignees_roles'] = $input['assignees_roles'];
        if ($user->update($input)) {
            //For whatever reason this just wont work in the above call, so a second is needed for now
            $user->status = isset($input['status']) ? 1 : 0;
            //$user->confirmed = isset($input['confirmed']) ? 1 : 0;
            $user->save();
            $this->checkUserRolesCount($roles);
            $this->flushRoles($roles, $user);
            //$this->flushPermissions($permissions, $user);
            return true;
        }
        throw new GeneralException('There was a problem updating this user. Please try again.');
    }

    /**
     * @param $input
     * @param $user
     * @throws GeneralException
     */
    private function checkUserByEmail($input, $user)
    {
        //Figure out if email is not the same
        if ($user->email != $input['email'])
        {
            //Check to see if email exists
            if (User::where('email', '=', $input['email'])->first()) {
                throw new GeneralException('That email address belongs to a different user.');
            }
        }
    }
    /**
     * @param $roles
     * @param $user
     */
    private function flushRoles($roles, $user)
    {
        //Flush roles out, then add array of new ones
        $user->detachRoles($user->roles);
        $user->attachRoles($roles['assignees_roles']);
    }

    /**
     * @param $roles
     * @throws GeneralException
     */
    private function checkUserRolesCount($roles)
    {
        //User Updated, Update Roles
        //Validate that there's at least one role chosen
        if (count($roles['assignees_roles']) == 0) {
            throw new GeneralException('You must choose at least one role.');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->status = 0;

        return $user->save();
    }
}
