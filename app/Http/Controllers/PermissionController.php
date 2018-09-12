<?php

namespace App\Http\Controllers;

use App\Classes\Reply;
use App\Http\Requests\Permission\DeleteRequest;
use App\Http\Requests\Permission\IndexRequest;
use App\Http\Requests\Permission\PermissionDeleteRequest;
use App\Http\Requests\Permission\PermissionStoreRequest;
use App\Http\Requests\Permission\PermissionUpdateRequest;
use App\Http\Requests\Permission\StoreRequest;
use App\Http\Requests\Permission\UpdateRequest;
use App\Permission;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\UserBaseController;

class PermissionController extends UserBaseController
{
    /**
     * @param IndexRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public $perm = [];

    public function __construct()
    {
        parent::__construct();
        $this->permdata = [
            'view-dashboard',
            'view-users',
            'add-user',
            'edit-user',
            'delete-user',
            'csv-import',
            'add-role',
            'edit-role',
            'delete-role',
            'view-role',
            'add-permission',
            'edit-permission',
            'delete-permission',
            'view-activity-log',
            'view-email-template',
            'edit-email-template',
            'message-to-other-users',
            'update-social-settings',
            'update-general-settings',
            'update-custom-fields',
            'manage-custom-fields',
            'update-theme-settings',
            'update-mail-settings',
            'update-common-settings',
            'view-permission',
        ];
    }

    public function index(IndexRequest $request)
    {
        $this->pageTitle = trans('menu.permissions');
        return \View::make($this->global->theme_folder.'.permission.index', $this->data);
    }

    /**
     * @return mixed
     */
    public function getPermissions()
    {
        $permissions = Permission::select('id', 'name', 'display_name', 'description');
        $data = Datatables::of($permissions)
            ->addColumn(
                'action',
                function($row) {
                    // Edit Button
                    $class = $this->global->theme_folder == 'admin-lte' ? 'bg-' : '';
                    $string = '<a style="margin: 1px;" href="javascript:;" onclick="knap.editModal(\'permissions\','.$row->id.')" class="btn  btn-info margin-top-10 btn-sm  '.$class.'purple"><i class="fa fa-edit"></i> Edit</a> ';
                    // Delete Button
                    $msg = trans('messages.deleteConfirm', ['name' => $row->name]);

                    if (!in_array($row->name, $this->permdata)) {
                        $string .= '<a style="margin: 1px;" href="javascript:;" onclick="knap.deleteAlert(\'permissions\',\'' . addslashes($msg) . '\',' . $row->id . ')" class="btn btn-danger margin-top-10 btn-sm  ' . $class . 'red"><i class="fa fa-trash"></i> Delete</a>';
                    }

                    return $string;
                }
            )
            ->make(true);
        return $data;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */

    public function create()
    {
        $this->icon = 'plus';
        return \View::make($this->global->theme_folder.'.permission.create-edit', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        \DB::beginTransaction();

        $permission = new Permission();
        $this->storeAndUpdate($permission, $request);

        \DB::commit();
        return Reply::success('messages.roleCreateSuccess');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->icon = 'pencil';
        $this->permissions = Permission::find($id);
        return \View::make($this->global->theme_folder.'.permission.create-edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param $id
     * @return array
     */
    public function update(UpdateRequest $request, $id)
    {

        \DB::beginTransaction();

        $permission = Permission::find($id);
        $this->storeAndUpdate($permission, $request);

        \DB::commit();

        return Reply::success('messages.permissionUpdateSuccess');
    }

    /**
     * Remove the specified resource from storage.
     * @param DeleteRequest $request
     * @param $id
     * @return array
     */
    public function destroy(DeleteRequest $request, $id)
    {
        Permission::whereId($id)->delete();

        return Reply::success('messages.deleteSuccess');
    }

    private function storeAndUpdate($permissions, $request)
    {
        $permissions->name  = $request->get('name');
        $permissions->display_name = $request->get('display_name');
        $permissions->description   = $request->get('description');
        $permissions->save();
    }

}
