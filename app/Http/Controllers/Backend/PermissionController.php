<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Backend\Permission\PermissionContract;
use App\Repositories\Backend\Role\RoleContract;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

/**
 * Class PermissionController
 * @package App\Http\Controllers\Backend
 */
class PermissionController extends BaseController
{


    /**
     * @var RoleContract
     */
    protected $roles;

    /**
     * @var PermissionContract
     */
    protected $permissions;

    /**
     * @param RoleContract       $roles
     * @param PermissionContract $permissions
     */
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
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $field = Input::get('sortField') ?: 'id';
            $sorter = str_replace('end', '', Input::get('sortOrder')) ?: 'desc';
            $permissions = $this->permissions->getPermissionsPaginated(Input::get('pageSize'), $field, $sorter);
            return response()->json($permissions->toArray());
        }

        return view('backend.permission.index');
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
                'roles' => $this->roles->getAllRoles(),
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
        $this->permissions->create($request->except('permission_roles'), $request->only('permission_roles'));
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
        $permission = $this->permissions->find($id, true);

        return view(
            'backend.permission.edit',
            [
                'permission' => $permission,
                'roles' => $this->roles->getAllRoles(),
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
        $this->permissions->update($id, $request->except('permission_roles'), $request->only('permission_roles'));

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
