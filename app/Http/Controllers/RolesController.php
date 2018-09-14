<?php

namespace App\Http\Controllers;

use App\Classes\Reply;
use App\Http\Controllers\UserBaseController;
use App\Http\Requests;
use App\Http\Requests\Role\IndexRequest;
use App\Http\Requests\Role\DeleteRequest;
use App\Permission;
use App\Role;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;

class RolesController extends UserBaseController
{

     /**
     * UserRolesPermissionsController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = trans('menu.roles');
    }

    /**
     * Display a listing of the resource.
     * @param IndexRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(IndexRequest $request)
    {

        return \View::make($this->global->theme_folder.'.roles.index', $this->data);
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        $roles = Role::select('id', 'display_name', 'description')->where('name', '<>', 'admin');
        $data = Datatables::of($roles)
            ->editColumn('perms', function ($row) {
                $ul = '<ul>';

                foreach ($row->perms as $permission) {
                    $ul .= '<li>'.$permission->display_name.'</li>';
                }

                $ul .= '</ul>';
                return $ul;
            })
            ->addColumn(
                'action',
                function ($row) {
                    // Edit Button
                    $class = $this->global->theme_folder == 'admin-lte' ? 'bg-' : '';
                    $string = '<a style="margin: 1px;" href="javascript:;" onclick="knap.editModal(\'roles\', '.$row->id.')" class="btn btn-info margin-top-10 btn-sm  '.$class.'purple"><i class="fa fa-edit"></i> Edit</a> ';
                    // Delete Button
                    $msg = trans('messages.deleteConfirm', ['name' => $row->display_name]);
                    $string .= '<a style="margin: 1px;" href="javascript:;" onclick="knap.deleteAlert(\'roles\',\''.addslashes($msg).'\','.$row->id.')"  class="btn btn-danger margin-top-10 btn-sm  '.$class.'red"><i class="fa fa-trash"></i> Delete</a>';
                    return $string;
                }
            )
            ->removeColumn('id')
            ->make(true);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $this->icon = 'plus';
        $this->permissions = Permission::all();
        return \View::make($this->global->theme_folder.'.roles.create-edit', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return array
     */
    public function store(StoreRequest $request)
    {
        \DB::beginTransaction();
        $role = new Role();
        $this->storeAndUpdate($role, $request);

        $permissions = [];

        if ($request->get('permission')) {
            foreach ($request->get('permission') as $item) {
                $permission = Permission::find($item);
                $permissions[] = $permission;
            }
        }

        $role->attachPermissions($permissions);
        \DB::commit();
        return Reply::success('messages.roleCreateSuccess');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Code Goes Here
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $this->icon = 'pencil';
        $this->role = Role::find($id);
        $this->permissions = Permission::all();
        $this->perms = $this->role->perms->pluck('id')->toArray();
        return \View::make($this->global->theme_folder.'.roles.create-edit', $this->data);
    }

    /**
     * Update the specified resource in storage
     * @param UpdateRequest $request
     * @param $id
     * @return array
     */
    public function update(UpdateRequest $request, $id)
    {
        \DB::beginTransaction();

        $role = Role::find($id);
        $this->storeAndUpdate($role, $request);

        $perms = $role->perms->pluck('id')->toArray();

        // Check role has permission

        if ($request->get('permission')) {
            // Attach permission to this role
            foreach ($request->get('permission') as $perm) {
                if (in_array($perm, $perms)) {
                    if (($key = array_search($perm, $perms)) !== false) {
                         unset($perms[$key]);
                    }
                } else {
                    $permission = Permission::find($perm);
                    $role->attachPermission($permission);
                }
            }
        }

        // Detach permission to roles
        if (count($perms) > 0) {
            foreach ($perms as $perm) {
                $permission = Permission::find($perm);
                $role->detachPermission($permission);
            }
        }

        \DB::commit();
        return Reply::success('messages.roleUpdateSuccess');
    }

    /**
     * Remove the specified resource from storage.
     * @param DeleteRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(DeleteRequest $request, $id)
    {

        Role::destroy($id);

        return Reply::success('messages.deleteSuccess');
    }

    /**
     * @param $role
     * @param $request
     */
    private function storeAndUpdate($role, $request)
    {
        $role->name  = $request->get('name');
        $role->display_name = $request->get('display_name');
        $role->description   = $request->get('description');
        $role->save();
    }
}
