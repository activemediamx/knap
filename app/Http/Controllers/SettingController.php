<?php

namespace App\Http\Controllers;

use App\Classes\Reply;
use App\Helpers\FileManager;
use App\Http\Requests\Settings\IndexRequest;
use App\Http\Requests\Settings\UpdateRequest;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class SettingController extends UserBaseController
{

    /**
     * @param IndexRequest $request
     * @return \Illuminate\Contracts\View\View
     */

    public function index(IndexRequest $request)
    {

        $this->pageTitle = trans('menu.socialSettings');
        return View::make($this->global->theme_folder.'.settings.social_settings', $this->data);
    }

    /**
     * @param UpdateRequest $request
     * @return array
     */
    public function update(UpdateRequest $request)
    {
        $setting = $this->global;
        $image = [];

        if ($request->setting == 'general') {
            $setting->site_name = $request->site_name;
            $setting->name      = $request->name;
            $setting->email     = $request->email;
            $setting->locale     = $request->language;

            if ($request->image) {
                $file         = new FileManager();
                $fileName = $file->uploadImageFileFromBase64String($request->image, $this->logoPath, null, 50);
                $setting->logo = $fileName;
            }

            $setting->save();
            return Reply::redirect(route('general-settings'), trans('messages.updateSuccess'));

        } elseif ($request->setting == 'social') {
            $setting->facebook_client_id     = $request->facebook_client_id;
            $setting->facebook_client_secret = $request->facebook_client_secret;
            $setting->google_client_id       = $request->google_client_id;
            $setting->google_client_secret   = $request->google_client_secret;
            $setting->twitter_client_id      = $request->twitter_client_id;
            $setting->twitter_client_secret  = $request->twitter_client_secret;
            $setting->recaptcha_public_key  = $request->recaptcha_public_key;
            $setting->recaptcha_private_key  = $request->recaptcha_private_key;
            $setting->save();

            return Reply::success('messages.updateSuccess');

        } elseif ($request->setting == 'theme') {
            $theme = $request->theme;
            $themeArray = explode(':', $request->theme);

            if(isset($themeArray[1])){
                $theme                = $themeArray[0];
                $setting->theme_color = $themeArray[1];
            }

            $setting->theme_folder = $theme;
            $setting->rtl = $request->rtl;
            $setting->save();

            return Reply::redirect(route('theme-settings'), trans('messages.themeChangeMessage'));

        } elseif ($request->setting == 'settings') {

            $setting->email_notification       = $request->emailNotification;
            $setting->recaptcha                = $request->recaptcha;
            $setting->remember_me              = $request->rememberMe;
            $setting->forget_password          = $request->forgetPassword;
            $setting->allow_register           = $request->allowRegister;
            $setting->email_confirmation       = $request->emailConfirmation;
            $setting->custom_field_on_register = $request->customOnRegister;
            $setting->save();

            return Reply::success('messages.updateSuccess');

        } elseif ($request->setting == 'mail') {

            $setting->mail_driver     = $request->mailDriver;
            $setting->mail_host       = $request->mailHost;
            $setting->mail_port       = $request->mailPort;
            $setting->mail_username   = $request->mailUsername;
            $setting->mail_password   = $request->mailPassword;
            $setting->mail_encryption = $request->mailEncryption;
            $setting->save();

            return Reply::success('messages.updateSuccess');
        }


    }

    /**
     * Display a listing of the resource.
     * @param IndexRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function getGeneralSettings(IndexRequest $request)
    {
        $this->pageTitle = trans('menu.generalSettings');
        return View::make($this->global->theme_folder.'.settings.general_settings', $this->data);
    }

    /**
     * Display a listing of the resource.
     * @param IndexRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function themeSettings(IndexRequest $request)
    {
        $this->pageTitle = trans('menu.themeSettings');
        return View::make($this->global->theme_folder.'.settings.theme_settings', $this->data);
    }

    /**
     * @param IndexRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function getSettings(IndexRequest $request)
    {
        $this->pageTitle = trans('menu.settings');
        return View::make($this->global->theme_folder.'.settings.settings', $this->data);
    }

    /**
     * @param IndexRequest $request
     * @return \Illuminate\Contracts\View\View
     */
    public function getMailSettings(IndexRequest $request)
    {
        $this->pageTitle = trans('menu.mailSettings');
        return View::make($this->global->theme_folder.'.settings.mail_setting', $this->data);
    }

}
