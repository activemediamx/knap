<?php

namespace Tests;

class RolesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testRolesIndexPage()
    {
        $user = $this->user();

        if($user->can('view-role')) {
            $this->actingAs($user)
                ->get(route('roles.index'))
                ->assertDontSee('Whoops')
                ->assertSee('role')
                ->assertDontSee('Sorry');
        }
    }

    public function testRoleEdit()
    {
        $user = $this->user();

        if($user->can('edit-role')) {
            $this->actingAs($user)
                ->get(route('roles.edit', $this->role()->id))
                ->assertDontSee('Whoops')
                ->assertSee('input')
                ->assertDontSee('Sorry');


            // Missing fields
            $this->actingAs($user)
                ->put(route('roles.update', $user->id),
                    [
                        'name'         => '',
                        'display_name' => '',
                        'description'  => '',
                        'permission'   => '',
                    ],
                    [
                        'X-Requested-With' => 'XMLHttpRequest'
                    ])
                ->assertDontSee('Whoops')
                ->assertSee('fail');

            // Some field filled

            $this->actingAs($user)
                ->put(route('roles.update', $user->id),
                    [
                        'name'                                        => $this->role()->name,
                        'display_name'                                => '',
                        'description'                                 => $this->role()->description,
                        'permission[' . $this->permission()->id . ']' => $this->permission()->id,
                    ],
                    [
                        'X-Requested-With' => 'XMLHttpRequest'
                    ])
                ->assertDontSee('Whoops')
                ->assertSee('fail');


            // Some field filled
            $this->actingAs($user)
                ->put(route('roles.update', $this->role()->id),
                    [
                        'name'         => 'Test',
                        'display_name' => 'Test',
                        'description'  => 'Its a test',
                        'permission'   => [$this->permission()->id => $this->permission()->id],
                    ],
                    [
                        'X-Requested-With' => 'XMLHttpRequest'
                    ])
                ->assertDontSee('Whoops')
                ->assertSee('success');
        }

    }

    // Destroy role

    public function testRoleDelete()
    {
        $user = $this->user();

        if($user->can('delete-role')) {
            // Missing fields
            $this->actingAs($user)
                ->delete(route('roles.destroy', $this->role()->id),
                    [
                    ],
                    [
                        'X-Requested-With' => 'XMLHttpRequest'
                    ])
                ->assertDontSee('Whoops')
                ->assertSee('success');
        }


    }

}
