<?php

namespace App\Http\Controllers;

use App\Classes\Reply;
use App\Helpers\FileManager;
use App\Http\Requests\User\DeleteRequest;
use App\Http\Requests\User\ExportCsvRequest;
use App\Http\Requests\User\IndexRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Role;
use Carbon\Carbon;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Facades\Datatables;

class UserController extends UserBaseController
{
     /**
     * UserController constructor.
     */

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = trans('menu.users');
    }

    /**
     * @param IndexRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(IndexRequest $request)
    {
        return \View::make($this->global->theme_folder.'.users.index', $this->data);
    }

     /**
     * @return mixed
     */
    public function getUsersList()
    {
        $users = User::select('id', 'avatar', 'name', 'email', 'gender', 'status')->where('id', '!=', $this->user->id);

        $data = Datatables::of($users)
            ->addColumn(
                'roles',
                function ($row) {
                    $ul = '<ul>';

                    foreach ($row->roles as $role) {
                        $ul .= '<li>'.$role->display_name.'</li>';
                    }

                    $ul .= '</ul>';
                    return $ul;
                }
            )
            ->addColumn(
                'action',
                function ($row) {
                     // Edit Button
                     $class = $this->global->theme_folder == 'admin-lte' ? 'bg-' : '';
                     $string = '<a style="margin: 1px;" href="javascript:;" onclick="knap.editModal(\'users\','.$row->id.')" class="btn btn-sm btn-info '.$class.'purple"><i class="fa fa-edit"></i> Edit</a> ';
                     // Delete Button
                     $msg = trans('messages.deleteConfirm', ['name' => $row->name]);
                     $string .= '<a style="margin: 1px;" href="javascript:;" onclick="knap.deleteAlert(\'users\',\''.addslashes($msg).'\','.$row->id.')"  class="btn btn-sm btn-danger '.$class.'red"><i class="fa fa-trash"></i> Delete</a>';

                     // Role Button
                     $string .= '<a style="margin: 1px;" href="javascript:;" onclick="knap.editModal(\'user-roles\','.$row->id.')"  class="btn btn-sm btn-success '.$class.'blue"><i class="fa fa-key"></i> Role</a>';
                     return $string;
                }
            )
            ->editColumn(
                'status',
                function ($row) {
                    $color = ['active' => 'success', 'inactive' => 'danger'];
                    return "<span class='label label-sm label-".$color[$row->status]."'>".
                    trans('core.'.$row->status). '</span>';
                }
            )
            ->editColumn(
                'gender',
                function ($row) {
                    $color = ['male' => 'aqua-active label-info', 'female' => 'pink label-primary'];


                    if ($this->global->theme_folder == 'metronic') {
                        $color = ['male' => 'blue', 'female' => 'female'];
                    }

                    return "<span id='status".$row->id."' class='label bg-".$color[$row->gender].' disabled '.
                    "color-palette'> <i class='fa fa-".$row->gender."'></i> " .
                    $row->gender. '</span>';
                }
            )
            ->editColumn(
                'avatar',
                function ($row) {
                    return '<img height="100px" src=\''.$row->getGravatarAttribute().'\'>';
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
        $user = new User();
        $this->fields = $user->getCustomFieldGroupsWithFields()->fields;
        return \View::make($this->global->theme_folder.'.users.create-edit', $this->data);
    }

    /**
     * @param StoreRequest $request
     * @return array
     */
    public function store(StoreRequest $request)
    {
        \DB::beginTransaction();

        $user = new User();
        $this->storeAndUpdate($user, $request);

        \DB::commit();
        return Reply::success('messages.createSuccess');
    }

     /**
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->iconEdit = 'pencil';
        $this->editUser = User::find($id)->withCustomFields();

        // Call the same create view for edit
        return $this->create();
    }

    /**
     * @param UpdateRequest $request
     * @param $id
     * @return array
     */
    public function update(UpdateRequest $request, $id)
    {
        \DB::beginTransaction();

        $user  = User::find($id);
        $this->storeAndUpdate($user, $request);

        \DB::commit();
        return Reply::success('messages.updateSuccess');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function getRoleModal($id)
    {
        $this->iconEdit = 'pencil';
        $this->roles = Role::where('name', '<>', 'admin')->get();
        $user = User::find($id);
        $this->user = $user;
        $this->assignedRoles = $user->roles->pluck('id')->toArray();
        return \View::make($this->global->theme_folder.'.users.role-modal', $this->data);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function postUpdateRole(Request $request)
    {
        $user = User::find($request->get('id'));
        $roleArray = array_values($request->role);

        $roles = Role::whereIn('id', $roleArray)->get();
        $user->detachRoles();

        foreach ($roles as $role) {
            $user->attachRole($role);
        }

        return Reply::success('messages.updateSuccess');
    }

    /**
     * @param DeleteRequest $request
     * @param $id
     * @return array
     */
    public function destroy(DeleteRequest $request, $id)
    {
        User::destroy($id);
        return Reply::success('messages.deleteSuccess');
    }

    /**
     * Export CSV
     * @param ExportCsvRequest $request
     */
    public function exportUser(ExportCsvRequest $request)
    {
        $data = User::select('id', 'name', 'email', 'dob', 'gender', 'status', 'user_type', 'created_at', 'updated_at')->get();

        Excel::create('Users-' . date('Y-m-d'), function ($excel) use ($data) {
            $excel->sheet('Users Details', function ($sheet) use ($data) {
                $sheet->fromArray($data);
                $sheet->row(1, ['ID', 'Name', 'Email', 'Date of Birth' , 'Gender', 'Status', 'User Type', 'Created_At', 'Updated_At']);
            });
        })->store('csv')->download('csv');
    }

    private function storeAndUpdate($user, $request)
    {
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->dob      = Carbon::parse($request->dob)->format('Y-m-d');
        $user->gender   = $request->get('gender');
        $user->status = $request->status ? $request->status : 'active';

        if ($request->password && $request->password !== '') {
            $user->password = Hash::make($request->password);
        }

        if ($request->image) {
            $x = floor($request->xCoordOne);
            $y = floor($request->yCoordOne);
            $height = floor($request->profileImageHeight);
            $width = floor($request->profileImageWidth);

            $file         = new FileManager();
            $fileName = $file->cropAndResize($request->image, $x, $y, $height, $width, $this->avatarPath);

            $user->avatar = $fileName;
        }

        $user->save();

        // To add custom fields data
        if ($request->get('custom_fields_data')) {
            $user->updateCustomFieldData($request->get('custom_fields_data'));
        }
    }

    public function getGravatarImage($email, $size = 250, $d = 'mm')
    {
        $url = 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) . '?d=' . $d . '&s=' . $size;

        return Reply::success('Gravatar Image Fetched', ['image' => $url]);
    }
}
