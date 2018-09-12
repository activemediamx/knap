<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserBaseController;
use App\Http\Requests\Dashboard\IndexRequest;
use App\Models\User;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\View;
use Zizaco\Entrust\Entrust;

class DashboardController extends UserBaseController
{

     /**
	 * UserDashboardController constructor.
	 */
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = trans('menu.dashboard');
    }

    /**
     * @param IndexRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(IndexRequest $request)
    {
        $this->activeUsers   = User::getCount('active');
        $this->inActiveUsers = User::getCount('inactive');
        $this->totalUsers    = User::getCount();
        $this->rolesCount    = Role::getCount();
        $this->permissionCount    = Permission::getCount();

        $this->recentUsers = User::where('status', 'active')->take(8)->latest()->get();

        return View::make($this->global->theme_folder.'.dashboard', $this->data);
    }
    
}
