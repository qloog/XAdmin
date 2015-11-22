<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\Backend\User\UserContract;
use App\Repositories\Backend\Role\RoleContract;
use App\Repositories\Backend\Permission\PermissionContract;

class UserController extends BaseController
{

    /**
     * @var UserContract
     */
    protected $users;

    /**
     * @var RoleContract
     */
    protected $roles;

    /**
     * @var PermissionContract
     */
    protected $permissions;


    /**
     * @param UserContract       $users
     * @param RoleContract       $roles
     * @param PermissionContract $permissions
     */
    public function __construct(UserContract $users, RoleContract $roles, PermissionContract $permissions)
    {
        $this->users = $users;
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = $this->users->getUsersPaginated(config('custom.per_page'));

        return view('backend.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = $this->users->find($id);
        return view('backend.user.edit')
            ->withUser($user)
            ->withUserRole($user->roles->lists('id')->all())
            ->withRoles($this->roles->getAllRoles('id','desc', true));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        if ($this->users->update($id, ['username'=>Input::get('username'), 'email' => Input::get('email')])) {
            return Redirect::to('admin/auth/user');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
