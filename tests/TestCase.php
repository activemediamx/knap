<?php
namespace Tests;

use App\Models\User;
use App\Permission;
use App\Role;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */


    protected $baseUrl = '';

    protected $user = null;

    //@codingStandardsIgnoreStart
    public function setUp()
    {
        parent::setUp();

        Model::unguard();

    }


    public function user()
    {
        $permission = $this->permission();
        $role       = $this->role();
        $user       = factory(User::class)->create();

        $role->attachPermission($permission);

        $user->attachRole($role);

        return $user;
    }

    public function role()
    {
        return factory(Role::class)->create();
    }

    public function permission()
    {
        return Permission::orderBy(\DB::raw('RAND()'))->first();
    }

}
