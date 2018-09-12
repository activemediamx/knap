<?php

namespace App\Providers;

use App\Models\EmailTemplate;
use App\Models\Setting;
use App\Models\User;
use App\Observers\EmailTemplateObserver;
use App\Observers\GeneralObserver;
use App\Observers\MailObserver;
use App\Observers\PermissionObserver;
use App\Observers\RoleObserver;
use App\Observers\SocialObserver;
use App\Observers\ThemeObserver;
use App\Observers\UserObserver;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

}
