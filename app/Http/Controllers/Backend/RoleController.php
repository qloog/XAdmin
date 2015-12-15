<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Backend\Permission\PermissionContract;
use App\Repositories\Backend\Role\RoleContract;
use Illuminate\Http\Request;
use App\Http\Requests;

class RoleController extends BaseController
{

    /**
     * @var RoleContract
     */
    protected $roles;

    /**
     * @var
     */
    protected $permissions;

    public function __construct(RoleContract $roles, PermissionContract $permissions)
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
        $roles = $this->roles->getRolesPaginated(config('custom_per_page'));
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
                'permissions' => $this->permissions->getAllPermissions('id', 'desc', true),
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
        return redirect()->route('admin.auth.role.index')->withFlashSuccess(trans('alerts.roles.created'));
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
        $role = $this->roles->find($id, true);

        return view(
            'backend.role.edit',
            [
                'role' => $role,
                'rolePermissions' => $role->permissions->lists('id')->all(),
                'permissions' => $this->permissions->getAllPermissions('id', 'asc', true)
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
        $this->roles->update($id, $request->all());
        return redirect()->route('admin.auth.role.index')->withFlashSuccess(trans('alerts.roles.updated'));

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
