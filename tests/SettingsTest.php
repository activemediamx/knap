<?php

namespace Tests;

class SettingsTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */

    public function testSettingPage()
    {
        $user = $this->user();

        if ($user->can('update-general-settings')) {
            $this->actingAs($user)
                ->get(route('general-settings'))
                ->assertSee('settings')
                ->assertDontSee('Whoops');
        }

        if ($user->can('update-theme-settings')) {
            $this->actingAs($user)
                ->get(route('theme-settings'))
                ->assertSee('settings')
                ->assertDontSee('Sorry')
                ->assertDontSee('Whoops');
        }

        if ($user->can('update-social-settings')) {
            $this->actingAs($user)
                ->get(route('social-settings'))
                ->assertSee('settings')
                ->assertDontSee('Sorry')
                ->assertDontSee('Whoops');
        }
    }

    public function testSettingEdit()
    {

    }

}
