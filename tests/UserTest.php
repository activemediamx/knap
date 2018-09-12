<?php

namespace Tests;

class UserTest extends TestCase
{

    public function testUserIndexPage()
    {
        $user = $this->user();

        if($user->can('view-users')) {
            $this->actingAs($user)
                ->get(route('users.index'))
                ->assertDontSee('Whoops')
                ->assertSee('users')
                ->assertDontSee('Sorry');
        }
    }

    public function testUserCreate()
    {
        $user = $this->user();

        if($user->can('add-user')) {
            $this->actingAs($user)
                ->get(route('users.create'))
                ->assertDontSee('Whoops')
                ->assertSee('input')
                ->assertDontSee('Sorry');
            // Missing fields
            $this->actingAs($user)
                ->post(route('users.store'),
                    ['name'     => '',
                     'email'    => '',
                     'password' => '',
                     'dob'      => '',
                     'gender'   => '',
                    ],
                    [
                        'X-Requested-With' => 'XMLHttpRequest'
                    ])
                ->assertDontSee('Whoops')
                ->assertSee('fail');

            // Some field filled
            $this->actingAs($user)
                ->post(route('users.store'),
                    ['name'     => '',
                     'email'    => 'test@test.com',
                     'password' => '1122323',
                     'dob'      => '2016-09-01',
                     'gender'   => '',
                    ],
                    [
                        'X-Requested-With' => 'XMLHttpRequest'
                    ])
                ->assertDontSee('Whoops')
                ->assertSee('fail');

            // Some field filled
            $this->actingAs($user)
                ->post(route('users.store'),
                    ['name'     => 'new',
                     'email'    => 'test1@test.com',
                     'password' => '1122323',
                     'dob'      => '2016-09-01',
                     'gender'   => 'male',
                    ],
                    [
                        'X-Requested-With' => 'XMLHttpRequest'
                    ])
                ->assertDontSee('Whoops')
                ->assertSee('success');
        }

    }

    public function testUserEdit()
    {
        $user = $this->user();

        if($user->can('edit-user')) {
            $this->actingAs($user)
                ->get(route('users.edit', $user->id))
                ->assertDontSee('Whoops')
                ->assertSee('input')
                ->assertDontSee('Sorry');
            // Missing fields

            $this->actingAs($user)
                ->put(route('users.update', $user->id),
                    ['name'     => '',
                     'email'    => '',
                     'password' => '',
                     'dob'      => '',
                     'gender'   => '',
                    ],
                    [
                        'X-Requested-With' => 'XMLHttpRequest'
                    ])
                ->assertDontSee('Whoops')
                ->assertSee('fail');

            // Some field filled
            $this->actingAs($user)
                ->put(route('users.update', $user->id),
                    ['name'     => '',
                     'email'    => 'test@test.com',
                     'password' => '1122323',
                     'dob'      => '2016-09-01',
                     'gender'   => '',
                    ],
                    [
                        'X-Requested-With' => 'XMLHttpRequest'
                    ])
                ->assertDontSee('Whoops')
                ->assertSee('fail');

            // Some field filled
            $this->actingAs($user)
                ->put(route('users.update', $user->id),
                    ['id'       => $user->id,
                     'name'     => 'new',
                     'email'    => 'test1@test.com',
                     'password' => '1122323',
                     'dob'      => \Carbon\Carbon::now(),
                     'gender'   => 'male',
                     'status'   => 'active'
                    ],
                    [
                        'X-Requested-With' => 'XMLHttpRequest'
                    ])
                ->assertDontSee('Whoops')
                ->assertSee('success');
        }

    }

    public function testUserDelete()
    {
        $user = $this->user();

        if($user->can('delete-user')) {
            // Missing fields
            $this->actingAs($user)
                ->delete(route('users.destroy', $user->id),
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
