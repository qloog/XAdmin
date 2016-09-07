<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Contracts\Repositories\Backend\UserRepository;
use App\Contracts\Repositories\Backend\RoleRepository;
use App\Contracts\Repositories\Backend\PermissionRepository;
use Laracasts\Flash\Flash;

class UserController extends BaseController
{

    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * @var RoleRepository
     */
    protected $roles;

    /**
     * @var PermissionRepository
     */
    protected $permissions;


    /**
     * @param UserRepository        $users
     * @param RoleRepository        $roles
     * @param PermissionRepository    $permissions
     */
    public function __construct(UserRepository $users, RoleRepository $roles, PermissionRepository $permissions)
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
        $users = $this->users->orderBy('id', 'desc')->paginate(10);

        return view('backend.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backend.user.create',
            [
                'roles' => $this->roles->all(),
                'userRoles' => array()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        if ($this->users->create($request->all())) {
            return redirect()->route('admin.auth.user.index');
        }
        return Redirect::back()->withInput()->withErrors('保存失败！');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = $this->users->find($id);

        return view(
            'backend.user.edit',
            [
                'user' => $user,
                'userRoles' => $user->roles->lists('id')->all(),
                'roles' => $this->roles->all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int    $id
     * @param Request $request
     * @return Response
     */
    public function update($id, Request $request)
    {
        if ($this->users->update($request->all(), $id)) {
            return redirect()->route('admin.auth.user.index');
        }
        return Redirect::back()->withInput()->withErrors('保存失败！');
    }

    /**
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function changePassword($id, Request $request) {
        return view('backend.user.change-password')
            ->withUser($this->users->find($id));
    }

    /**
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function updatePassword($id, Request $request) {
        $this->users->updatePassword($id, $request->all());
        return redirect()->route('admin.auth.user.index')->withFlashSuccess(trans("alerts.users.updated_password"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->users->destroy($id);

        return redirect()
            ->route('admin.auth.user.index')
            ->withSuccess('Post deleted.');
    }
}
