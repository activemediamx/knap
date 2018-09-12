<?php

/**
 * User Login And Forget Password Routes
 */
Route::group(['namespace' => 'Auth', 'middleware' => 'web'], function () {

    Route::get('/', ['as' => 'user.login', 'uses' => 'LoginController@index']);
    Route::get('/login', ['as' => 'user.login', 'uses' => 'LoginController@index']);
    Route::post('/login', ['as' => 'user.login_check', 'uses' => 'LoginController@ajaxLogin']);
    Route::get('register', ['as' => 'get-register', 'uses' => 'LoginController@getRegister']);
    Route::post('register', ['as' => 'post-register', 'uses' => 'LoginController@postRegister']);
    Route::get('logout', ['as' => 'user.logout', 'uses' => 'LoginController@logout']);

    Route::get('forget-password', ['as' => 'get-reset', 'uses' => 'LoginController@getReset']);
    Route::post('forget-password', ['as' => 'post-reset', 'uses' => 'LoginController@postReset']);
    Route::get('password/reset', ['as' => 'get-password-reset', 'uses' => 'LoginController@getPasswordReset']);
    Route::post('password/reset', ['as' => 'post-password-reset', 'uses' => 'LoginController@postPasswordReset']);

    // Social Auth
    Route::get('/redirect/{provider}', ['uses' => 'LoginController@redirect', 'as' => 'social.login']);
    Route::get('/callback/{provider}', ['uses' => 'LoginController@callback']);

});


// User Panel After Login
Route::group(['middleware' => ['auth.user', 'web'], 'prefix' => ''], function () {

    //region Dashboard Routes
    Route::resource('dashboard', 'DashboardController');
    //endregion

    //region Profile Routes
    Route::get('profile-edit', ['as' => 'profile-edit', 'uses' => 'UserProfileSettingController@editProfile']);
    Route::resource('profiles', 'UserProfileSettingController');
    //endregion

    //region Users Routes
    Route::get('get-image/{email}', ['as' => 'user.get-image', 'uses' => 'UserController@getGravatarImage']);
    Route::get('export-users', ['as' => 'user.export-users', 'uses' => 'UserController@exportUser']);
    Route::get('get-users', ['as' => 'user.get-users', 'uses' => 'UserController@getUsersList']);
    Route::get('role-modal/{user_role}', ['as' => 'user-roles.edit', 'uses' => 'UserController@getRoleModal']);
    Route::post('assign-role', ['as' => 'user.update-role', 'uses' => 'UserController@postUpdateRole']);
    Route::resource('users', 'UserController');

    // User message
    Route::get('chat', ['as' => 'chat', 'uses' => 'UserChatController@index']);
    Route::post('message-submit', ['as' => 'chat.message-submit', 'uses' => 'UserChatController@postChatMessage']);
    //endregion

    // Activity Log
    Route::get('activity', ['as' => 'activity', 'uses' => 'ActivityLogController@index']);
    Route::get('ajax_activity', ['as' => 'ajax.activity', 'uses' => 'ActivityLogController@activityLog']);
    //endregion

    //region Roles Or Permission Route

    Route::get('get-roles', ['as' => 'user.get-roles', 'uses' => 'RolesController@getRoles']);
    Route::resource('roles', 'RolesController');

    Route::get('get-permissions', ['as' => 'user.get-permissions', 'uses' => 'PermissionController@getPermissions']);
    Route::resource('permissions', 'PermissionController');
    //endregion

    //region Setting Routes
    Route::get('general-settings', ['as' => 'general-settings', 'uses' => 'SettingController@getGeneralSettings']);
    Route::get('social-settings', ['as' => 'social-settings', 'uses' => 'SettingController@index']);
    Route::get('theme-settings', ['as' => 'theme-settings', 'uses' => 'SettingController@themeSettings']);
    Route::get('common-settings', ['as' => 'common-settings', 'uses' => 'SettingController@getSettings']);
    Route::get('mail-settings', ['as' => 'mail-settings', 'uses' => 'SettingController@getMailSettings']);
    Route::resource('settings', 'SettingController');
    //endregion

    Route::get('get-custom-fields', ['as' => 'get-custom-fields', 'uses' => 'CustomFieldsController@getFields']);
    Route::resource('custom-fields', 'CustomFieldsController');

    //region Email Template Routes
    Route::get('get-email-template', ['as' => 'get-email-template', 'uses' => 'EmailTemplateController@getEmailTemplate']);
    Route::resource('email-templates', 'EmailTemplateController');
    //endregion

    //region Settings

    //region Session Management Routes
    Route::get('get-sessions', ['as' => 'get-sessions', 'uses' => 'SessionController@getSessions']);
    Route::resource('sessions', 'SessionController');
    //endregion
});

// This is added for the purpose of translation
Route::group(['middleware' => ['auth.user', 'web'], 'prefix' => 'translations'], function () {

});
