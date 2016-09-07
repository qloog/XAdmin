<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\Repositories\Backend\PermissionRepository;
use App\Contracts\Repositories\Backend\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class PermissionController
 * @package App\Http\Controllers\Backend
 */
class PermissionController extends BaseController
{


    /**
     * @var RoleRepository
     */
    protected $roles;

    /**
     * @var PermissionRepository
     */
    protected $permissions;

    /**
     * @param RoleRepository       $roles
     * @param PermissionRepository $permissions
     */
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
        $permissions = $this->permissions->orderBy('id', 'desc')->paginate();

        return view('backend.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'backend.permission.create',
            [
                'roles' => $this->roles->all(),
                'permissionRoles' => array()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->permissions->create($request->all());
        return redirect()->route('admin.auth.permission.index')->withSuccess(trans('alerts.permissions.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->permissions->find($id);

        return view(
            'backend.permission.edit',
            [
                'permission' => $permission,
                'roles' => $this->roles->all(),
                'permissionRoles' => $permission->roles->lists('id')->all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     * @param  int                      $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->permissions->update($request->all(), $id);

        return redirect()->route('admin.auth.permission.index')->withSuccess(trans('alerts.permissions.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->permissions->destroy($id);

        return redirect()->route('admin.auth.permission.index')->withSuccess(trans('alerts.common.deleted'));
    }
}
