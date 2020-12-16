<?php

namespace App\Http\Middleware;

use App\Customization;
use App\Setting;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

/**
 * The purpose of this middleware is to share the settings record of
 * settings table to all controllers and views.
 *
 * This middleware should always execute after Installed middleware.
 *
 * Class GlobalVariablesMiddleware
 * @package App\Http\Middleware
 */
class GlobalVariablesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**
         * Start initial global variables for all controller and views
         */
        // share site_global_settings to all controllers
        App::singleton('site_global_settings', function(){
            return Setting::find(1);
        });

        // share site_global_settings to all views
        View::share('site_global_settings', app('site_global_settings'));

        $settings = app('site_global_settings');

        // initial google recaptcha configuration
        if(Request::is('login')
            && $settings->setting_site_recaptcha_login_enable == Setting::SITE_RECAPTCHA_LOGIN_ENABLE)
        {
            config_re_captcha($settings->setting_site_recaptcha_site_key, $settings->setting_site_recaptcha_secret_key);
        }
        if(Request::is('register')
            && $settings->setting_site_recaptcha_sign_up_enable == Setting::SITE_RECAPTCHA_SIGN_UP_ENABLE)
        {
            config_re_captcha($settings->setting_site_recaptcha_site_key, $settings->setting_site_recaptcha_secret_key);
        }
        if(Request::is('contact')
            && $settings->setting_site_recaptcha_contact_enable == Setting::SITE_RECAPTCHA_CONTACT_ENABLE)
        {
            config_re_captcha($settings->setting_site_recaptcha_site_key, $settings->setting_site_recaptcha_secret_key);
        }

        // initial the site language
        App::setlocale(empty($settings->setting_site_language) ? Setting::LANGUAGE_EN : $settings->setting_site_language);

        // check user profile prefer language
        if(Auth::check())
        {
            $login_user = Auth::user();

            if(!empty($login_user->user_prefer_language))
            {
                App::setlocale($login_user->user_prefer_language);
            }
        }
        else
        {
            // retrieve language preference from session for visitor
            $user_prefer_language = Session::get('user_prefer_language');

            if(!empty($user_prefer_language))
            {
                App::setlocale($user_prefer_language);
            }
        }

        $route_name = empty($request->route()->getName()) ? "" : $request->route()->getName();

        if(!str_starts_with($route_name, 'admin.') && !str_starts_with($route_name, 'user.'))
        {
            // Start get customization colors
            $site_primary_color = Customization::SITE_PRIMARY_COLOR_DEFAULT;
            $site_header_background_color = Customization::SITE_HEADER_BACKGROUND_COLOR_DEFAULT;
            $site_footer_background_color = Customization::SITE_FOOTER_BACKGROUND_COLOR_DEFAULT;
            $site_header_font_color = Customization::SITE_HEADER_FONT_COLOR_DEFAULT;
            $site_footer_font_color = Customization::SITE_FOOTER_FONT_COLOR_DEFAULT;

            if(Schema::hasTable('customizations'))
            {
                $site_primary_color = Customization::where('customization_key', Customization::SITE_PRIMARY_COLOR)
                    ->get()->first()->customization_value;

                $site_header_background_color = Customization::where('customization_key', Customization::SITE_HEADER_BACKGROUND_COLOR)
                    ->get()->first()->customization_value;

                $site_footer_background_color = Customization::where('customization_key', Customization::SITE_FOOTER_BACKGROUND_COLOR)
                    ->get()->first()->customization_value;

                $site_header_font_color = Customization::where('customization_key', Customization::SITE_HEADER_FONT_COLOR)
                    ->get()->first()->customization_value;

                $site_footer_font_color = Customization::where('customization_key', Customization::SITE_FOOTER_FONT_COLOR)
                    ->get()->first()->customization_value;
            }

            view()->share('customization_site_primary_color', $site_primary_color);
            view()->share('customization_site_header_background_color', $site_header_background_color);
            view()->share('customization_site_footer_background_color', $site_footer_background_color);
            view()->share('customization_site_header_font_color', $site_header_font_color);
            view()->share('customization_site_footer_font_color', $site_footer_font_color);
            // End get customization colors
        }

        /**
         * End initial global variables for all controller and views
         */

        return $next($request);
    }
}
