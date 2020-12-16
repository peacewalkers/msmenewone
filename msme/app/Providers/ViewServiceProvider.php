<?php

namespace App\Providers;

use App\Customization;
use App\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'errors::403',
            'errors::404',
            'errors::405',
            'errors::406',
            'errors::408',
            'errors::419',
            'errors::500'], function($view)
        {
            // global settings
            $site_global_settings = Setting::find(1);

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
            // End get customization colors

            $view->with([
                'site_global_settings' => $site_global_settings,
                'customization_site_primary_color' => $site_primary_color,
                'customization_site_header_background_color' => $site_header_background_color,
                'customization_site_footer_background_color' => $site_footer_background_color,
                'customization_site_header_font_color' => $site_header_font_color,
                'customization_site_footer_font_color' => $site_footer_font_color,
            ]);
        });
    }
}
