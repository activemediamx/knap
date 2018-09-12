<?php
namespace Tests;

class DashboardTest extends TestCase
{

    public function testDashboardIndexPage()
    {
        $user = $this->user();

        if($user->can('view-dashboard')){
            $this->assertTrue($user->can('view-dashboard'));
            $this->actingAs($user)
                ->get(route('dashboard.index'))
                ->assertDontSee('Whoops')
                ->assertSee('user')
                ->assertDontSee('Sorry');

        }else{
            $this->assertFalse($user->can('view-dashboard'));
        }

    }

}
