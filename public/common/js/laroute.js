(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost/',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"install","name":"LaravelInstaller::welcome","action":"Froiden\LaravelInstaller\Controllers\WelcomeController@welcome"},{"host":null,"methods":["GET","HEAD"],"uri":"install\/environment","name":"LaravelInstaller::environment","action":"Froiden\LaravelInstaller\Controllers\EnvironmentController@environment"},{"host":null,"methods":["GET","HEAD"],"uri":"install\/environment\/save","name":"LaravelInstaller::environmentSave","action":"Froiden\LaravelInstaller\Controllers\EnvironmentController@save"},{"host":null,"methods":["GET","HEAD"],"uri":"install\/requirements","name":"LaravelInstaller::requirements","action":"Froiden\LaravelInstaller\Controllers\RequirementsController@requirements"},{"host":null,"methods":["GET","HEAD"],"uri":"install\/permissions","name":"LaravelInstaller::permissions","action":"Froiden\LaravelInstaller\Controllers\PermissionsController@permissions"},{"host":null,"methods":["GET","HEAD"],"uri":"install\/database","name":"LaravelInstaller::database","action":"Froiden\LaravelInstaller\Controllers\DatabaseController@database"},{"host":null,"methods":["GET","HEAD"],"uri":"install\/final","name":"LaravelInstaller::final","action":"Froiden\LaravelInstaller\Controllers\FinalController@finish"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"user.login","action":"App\Http\Controllers\Auth\LoginController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"user.login","action":"App\Http\Controllers\Auth\LoginController@index"},{"host":null,"methods":["POST"],"uri":"login","name":"user.login_check","action":"App\Http\Controllers\Auth\LoginController@ajaxLogin"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"get-register","action":"App\Http\Controllers\Auth\LoginController@getRegister"},{"host":null,"methods":["POST"],"uri":"register","name":"post-register","action":"App\Http\Controllers\Auth\LoginController@postRegister"},{"host":null,"methods":["GET","HEAD"],"uri":"logout","name":"user.logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"forget-password","name":"get-reset","action":"App\Http\Controllers\Auth\LoginController@getReset"},{"host":null,"methods":["POST"],"uri":"forget-password","name":"post-reset","action":"App\Http\Controllers\Auth\LoginController@postReset"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"get-password-reset","action":"App\Http\Controllers\Auth\LoginController@getPasswordReset"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":"post-password-reset","action":"App\Http\Controllers\Auth\LoginController@postPasswordReset"},{"host":null,"methods":["GET","HEAD"],"uri":"redirect\/{provider}","name":"social.login","action":"App\Http\Controllers\Auth\LoginController@redirect"},{"host":null,"methods":["GET","HEAD"],"uri":"callback\/{provider}","name":null,"action":"App\Http\Controllers\Auth\LoginController@callback"},{"host":null,"methods":["GET","HEAD"],"uri":"dashboard","name":"dashboard.index","action":"App\Http\Controllers\DashboardController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"dashboard\/create","name":"dashboard.create","action":"App\Http\Controllers\DashboardController@create"},{"host":null,"methods":["POST"],"uri":"dashboard","name":"dashboard.store","action":"App\Http\Controllers\DashboardController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"dashboard\/{dashboard}","name":"dashboard.show","action":"App\Http\Controllers\DashboardController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"dashboard\/{dashboard}\/edit","name":"dashboard.edit","action":"App\Http\Controllers\DashboardController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"dashboard\/{dashboard}","name":"dashboard.update","action":"App\Http\Controllers\DashboardController@update"},{"host":null,"methods":["DELETE"],"uri":"dashboard\/{dashboard}","name":"dashboard.destroy","action":"App\Http\Controllers\DashboardController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"profile-edit","name":"profile-edit","action":"App\Http\Controllers\UserProfileSettingController@editProfile"},{"host":null,"methods":["GET","HEAD"],"uri":"profiles","name":"profiles.index","action":"App\Http\Controllers\UserProfileSettingController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"profiles\/create","name":"profiles.create","action":"App\Http\Controllers\UserProfileSettingController@create"},{"host":null,"methods":["POST"],"uri":"profiles","name":"profiles.store","action":"App\Http\Controllers\UserProfileSettingController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"profiles\/{profile}","name":"profiles.show","action":"App\Http\Controllers\UserProfileSettingController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"profiles\/{profile}\/edit","name":"profiles.edit","action":"App\Http\Controllers\UserProfileSettingController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"profiles\/{profile}","name":"profiles.update","action":"App\Http\Controllers\UserProfileSettingController@update"},{"host":null,"methods":["DELETE"],"uri":"profiles\/{profile}","name":"profiles.destroy","action":"App\Http\Controllers\UserProfileSettingController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"get-image\/{email}","name":"user.get-image","action":"App\Http\Controllers\UserController@getGravatarImage"},{"host":null,"methods":["GET","HEAD"],"uri":"export-users","name":"user.export-users","action":"App\Http\Controllers\UserController@exportUser"},{"host":null,"methods":["GET","HEAD"],"uri":"get-users","name":"user.get-users","action":"App\Http\Controllers\UserController@getUsersList"},{"host":null,"methods":["GET","HEAD"],"uri":"role-modal\/{user_role}","name":"user-roles.edit","action":"App\Http\Controllers\UserController@getRoleModal"},{"host":null,"methods":["POST"],"uri":"assign-role","name":"user.update-role","action":"App\Http\Controllers\UserController@postUpdateRole"},{"host":null,"methods":["GET","HEAD"],"uri":"users","name":"users.index","action":"App\Http\Controllers\UserController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"users\/create","name":"users.create","action":"App\Http\Controllers\UserController@create"},{"host":null,"methods":["POST"],"uri":"users","name":"users.store","action":"App\Http\Controllers\UserController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"users\/{user}","name":"users.show","action":"App\Http\Controllers\UserController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"users\/{user}\/edit","name":"users.edit","action":"App\Http\Controllers\UserController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"users\/{user}","name":"users.update","action":"App\Http\Controllers\UserController@update"},{"host":null,"methods":["DELETE"],"uri":"users\/{user}","name":"users.destroy","action":"App\Http\Controllers\UserController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"chat","name":"chat","action":"App\Http\Controllers\UserChatController@index"},{"host":null,"methods":["POST"],"uri":"message-submit","name":"chat.message-submit","action":"App\Http\Controllers\UserChatController@postChatMessage"},{"host":null,"methods":["GET","HEAD"],"uri":"activity","name":"activity","action":"App\Http\Controllers\ActivityLogController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"ajax_activity","name":"ajax.activity","action":"App\Http\Controllers\ActivityLogController@activityLog"},{"host":null,"methods":["GET","HEAD"],"uri":"get-roles","name":"user.get-roles","action":"App\Http\Controllers\RolesController@getRoles"},{"host":null,"methods":["GET","HEAD"],"uri":"roles","name":"roles.index","action":"App\Http\Controllers\RolesController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"roles\/create","name":"roles.create","action":"App\Http\Controllers\RolesController@create"},{"host":null,"methods":["POST"],"uri":"roles","name":"roles.store","action":"App\Http\Controllers\RolesController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"roles\/{role}","name":"roles.show","action":"App\Http\Controllers\RolesController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"roles\/{role}\/edit","name":"roles.edit","action":"App\Http\Controllers\RolesController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"roles\/{role}","name":"roles.update","action":"App\Http\Controllers\RolesController@update"},{"host":null,"methods":["DELETE"],"uri":"roles\/{role}","name":"roles.destroy","action":"App\Http\Controllers\RolesController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"get-permissions","name":"user.get-permissions","action":"App\Http\Controllers\PermissionController@getPermissions"},{"host":null,"methods":["GET","HEAD"],"uri":"permissions","name":"permissions.index","action":"App\Http\Controllers\PermissionController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"permissions\/create","name":"permissions.create","action":"App\Http\Controllers\PermissionController@create"},{"host":null,"methods":["POST"],"uri":"permissions","name":"permissions.store","action":"App\Http\Controllers\PermissionController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"permissions\/{permission}","name":"permissions.show","action":"App\Http\Controllers\PermissionController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"permissions\/{permission}\/edit","name":"permissions.edit","action":"App\Http\Controllers\PermissionController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"permissions\/{permission}","name":"permissions.update","action":"App\Http\Controllers\PermissionController@update"},{"host":null,"methods":["DELETE"],"uri":"permissions\/{permission}","name":"permissions.destroy","action":"App\Http\Controllers\PermissionController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"general-settings","name":"general-settings","action":"App\Http\Controllers\SettingController@getGeneralSettings"},{"host":null,"methods":["GET","HEAD"],"uri":"social-settings","name":"social-settings","action":"App\Http\Controllers\SettingController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"theme-settings","name":"theme-settings","action":"App\Http\Controllers\SettingController@themeSettings"},{"host":null,"methods":["GET","HEAD"],"uri":"common-settings","name":"common-settings","action":"App\Http\Controllers\SettingController@getSettings"},{"host":null,"methods":["GET","HEAD"],"uri":"mail-settings","name":"mail-settings","action":"App\Http\Controllers\SettingController@getMailSettings"},{"host":null,"methods":["GET","HEAD"],"uri":"settings","name":"settings.index","action":"App\Http\Controllers\SettingController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"settings\/create","name":"settings.create","action":"App\Http\Controllers\SettingController@create"},{"host":null,"methods":["POST"],"uri":"settings","name":"settings.store","action":"App\Http\Controllers\SettingController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"settings\/{setting}","name":"settings.show","action":"App\Http\Controllers\SettingController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"settings\/{setting}\/edit","name":"settings.edit","action":"App\Http\Controllers\SettingController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"settings\/{setting}","name":"settings.update","action":"App\Http\Controllers\SettingController@update"},{"host":null,"methods":["DELETE"],"uri":"settings\/{setting}","name":"settings.destroy","action":"App\Http\Controllers\SettingController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"get-custom-fields","name":"get-custom-fields","action":"App\Http\Controllers\CustomFieldsController@getFields"},{"host":null,"methods":["GET","HEAD"],"uri":"custom-fields","name":"custom-fields.index","action":"App\Http\Controllers\CustomFieldsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"custom-fields\/create","name":"custom-fields.create","action":"App\Http\Controllers\CustomFieldsController@create"},{"host":null,"methods":["POST"],"uri":"custom-fields","name":"custom-fields.store","action":"App\Http\Controllers\CustomFieldsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"custom-fields\/{custom_field}","name":"custom-fields.show","action":"App\Http\Controllers\CustomFieldsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"custom-fields\/{custom_field}\/edit","name":"custom-fields.edit","action":"App\Http\Controllers\CustomFieldsController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"custom-fields\/{custom_field}","name":"custom-fields.update","action":"App\Http\Controllers\CustomFieldsController@update"},{"host":null,"methods":["DELETE"],"uri":"custom-fields\/{custom_field}","name":"custom-fields.destroy","action":"App\Http\Controllers\CustomFieldsController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"get-email-template","name":"get-email-template","action":"App\Http\Controllers\EmailTemplateController@getEmailTemplate"},{"host":null,"methods":["GET","HEAD"],"uri":"email-templates","name":"email-templates.index","action":"App\Http\Controllers\EmailTemplateController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"email-templates\/create","name":"email-templates.create","action":"App\Http\Controllers\EmailTemplateController@create"},{"host":null,"methods":["POST"],"uri":"email-templates","name":"email-templates.store","action":"App\Http\Controllers\EmailTemplateController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"email-templates\/{email_template}","name":"email-templates.show","action":"App\Http\Controllers\EmailTemplateController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"email-templates\/{email_template}\/edit","name":"email-templates.edit","action":"App\Http\Controllers\EmailTemplateController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"email-templates\/{email_template}","name":"email-templates.update","action":"App\Http\Controllers\EmailTemplateController@update"},{"host":null,"methods":["DELETE"],"uri":"email-templates\/{email_template}","name":"email-templates.destroy","action":"App\Http\Controllers\EmailTemplateController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"get-sessions","name":"get-sessions","action":"App\Http\Controllers\SessionController@getSessions"},{"host":null,"methods":["GET","HEAD"],"uri":"sessions","name":"sessions.index","action":"App\Http\Controllers\SessionController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"sessions\/create","name":"sessions.create","action":"App\Http\Controllers\SessionController@create"},{"host":null,"methods":["POST"],"uri":"sessions","name":"sessions.store","action":"App\Http\Controllers\SessionController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"sessions\/{session}","name":"sessions.show","action":"App\Http\Controllers\SessionController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"sessions\/{session}\/edit","name":"sessions.edit","action":"App\Http\Controllers\SessionController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"sessions\/{session}","name":"sessions.update","action":"App\Http\Controllers\SessionController@update"},{"host":null,"methods":["DELETE"],"uri":"sessions\/{session}","name":"sessions.destroy","action":"App\Http\Controllers\SessionController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"_dusk\/login\/{userId}\/{guard?}","name":null,"action":"Laravel\Dusk\Http\Controllers\UserController@login"},{"host":null,"methods":["GET","HEAD"],"uri":"_dusk\/logout\/{guard?}","name":null,"action":"Laravel\Dusk\Http\Controllers\UserController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"_dusk\/user\/{guard?}","name":null,"action":"Laravel\Dusk\Http\Controllers\UserController@user"},{"host":null,"methods":["GET","HEAD"],"uri":"translations\/view\/{group?}","name":null,"action":"Barryvdh\TranslationManager\Controller@getView"},{"host":null,"methods":["GET","HEAD"],"uri":"translations\/{group?}","name":null,"action":"Barryvdh\TranslationManager\Controller@getIndex"},{"host":null,"methods":["POST"],"uri":"translations\/add\/{group}","name":null,"action":"Barryvdh\TranslationManager\Controller@postAdd"},{"host":null,"methods":["POST"],"uri":"translations\/edit\/{group}","name":null,"action":"Barryvdh\TranslationManager\Controller@postEdit"},{"host":null,"methods":["POST"],"uri":"translations\/delete\/{group}\/{key}","name":null,"action":"Barryvdh\TranslationManager\Controller@postDelete"},{"host":null,"methods":["POST"],"uri":"translations\/import","name":null,"action":"Barryvdh\TranslationManager\Controller@postImport"},{"host":null,"methods":["POST"],"uri":"translations\/find","name":null,"action":"Barryvdh\TranslationManager\Controller@postFind"},{"host":null,"methods":["POST"],"uri":"translations\/publish\/{group}","name":null,"action":"Barryvdh\TranslationManager\Controller@postPublish"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                return uri;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

