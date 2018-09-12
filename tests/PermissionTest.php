<?php

namespace Tests;

class PermissionTest extends TestCase
{

    public function testPermissionIndexPage()
    {
        $user = $this->user();

        if($user->can('view-permission')) {
            $this->actingAs($user)
                ->get(route('permissions.index'))
                ->assertDontSee('Whoops')
                ->assertSee('permission')
                ->assertDontSee('Sorry');
        }
    }

    public function testPermissionEdit()
    {
        $user = $this->user();

        if($user->can('edit-permission')) {
            $this->actingAs($user)
                ->get(route('permissions.edit', $this->permission()->id))
                ->assertDontSee('Whoops')
                ->assertSee('input')
                ->assertDontSee('Sorry');


            // Missing fields
            $this->actingAs($user)
                ->put(route('permissions.update', $user->id),
                    [
                        'name'         => '',
                        'display_name' => '',
                        'description'  => '',
                    ],
                    [
                        'X-Requested-With' => 'XMLHttpRequest'
                    ])
                ->assertDontSee('Whoops')
                ->assertSee('fail');

            // Some field filled
            $this->actingAs($user)
                ->put(route('permissions.update', $user->id),
                    [
                        'name'         => $this->permission()->name,
                        'display_name' => '',
                        'description'  => $this->permission()->description,
                    ],
                    [
                        'X-Requested-With' => 'XMLHttpRequest'
                    ])
                ->assertDontSee('Whoops')
                ->assertSee('fail');


            // Some field filled
            $this->actingAs($user)
                ->put(route('permissions.update', $this->permission()->id),
                    [
                        'name'         => 'Test',
                        'display_name' => 'Test',
                        'description'  => 'Its a test',
                    ],
                    [
                        'X-Requested-With' => 'XMLHttpRequest'
                    ])
                ->assertDontSee('Whoops')
                ->assertSee('success');
        }

    }

    // Destroy role

    public function testPermissionDelete()
    {
        $user = $this->user();

        if($user->can('delete-permission')) {
            // Missing fields
            $this->actingAs($user)
                ->delete(route('permissions.destroy', $this->permission()->id),
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
