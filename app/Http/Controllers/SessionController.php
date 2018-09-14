<?php

namespace App\Http\Controllers;

use App\Classes\Reply;
use App\Http\Requests\User\DeleteRequest;
use App\Http\Requests\User\ExportCsvRequest;
use App\Http\Requests\User\IndexRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\Session;
use App\Models\User;
use App\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Facades\Datatables;

class SessionController extends UserBaseController
{
     /**
     * UserController constructor.
     */

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Active Sessions';
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return \View::make($this->global->theme_folder.'.sessions.index', $this->data);
    }

     /**
     * @return mixed
     */
    public function getSessions()
    {
        $sessions = Session::select('sessions.id as session_id', 'users.name as name', 'ip_address', 'user_agent', 'last_activity')
            ->join('users', 'users.id', '=', 'sessions.user_id')
            ->where('ip_address', '<>', \Request::ip());

        $data = Datatables::of($sessions)

            ->addColumn(
                'action',
                function ($row) {
                    // Edit Button
                    $class = $this->global->theme_folder == 'admin-lte' ? 'bg-' : '';
                     // Delete Button
                    $msg = trans('messages.deleteConfirmSession');
                    return '<a style="margin: 1px;" href="javascript:;" onclick="knap.deleteAlert(\'sessions\',\''.addslashes($msg).'\',\''.$row->session_id.'\')"  class="btn btn-sm btn-danger '.$class.'red"><i class="fa fa-trash"></i> Delete</a>';
                }
            )
            ->editColumn(
                'last_activity',
                function ($row) {
                    return Carbon::parse(strtotime($row->last_activity));
                }
            )
            ->make(true);
        return $data;
    }

    /**
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        Session::where('id', $id)->delete();
        return Reply::success('messages.deleteSuccess');
    }
}
