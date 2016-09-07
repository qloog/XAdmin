<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\Backend\PermissionRepository;
use App\Contracts\Repositories\Backend\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends BaseController
{

    /**
     * @var RoleRepository
     */
    protected $roles;

    /**
     * @var PermissionRepository
     */
    protected $permissions;

    public function __construct(RoleRepository $roles, PermissionRepository $permissions)
    {
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roles->orderBy('id', 'desc')->paginate(15);
        return view('backend.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.role.create',
            [
                'permissions' => $this->permissions->all(),
                'rolePermissions' => array()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->roles->create($request->all());
        return redirect()->route('admin.auth.role.index')->withSuccess(trans('alerts.roles.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($this->roles->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->roles->find($id);

        return view(
            'backend.role.edit',
            [
                'role' => $role,
                'rolePermissions' => $role->perms->lists('id')->all(),
                'permissions' => $this->permissions->all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->roles->update($request->all(), $id);
        return redirect()->route('admin.auth.role.index')->withSuccess(trans('alerts.roles.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->roles->destroy($id);

        return redirect()
            ->route('admin.auth.role.index')
            ->withSuccess(trans('alerts.users.deleted'));
    }
}
