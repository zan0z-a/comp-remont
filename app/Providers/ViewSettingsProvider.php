<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class ViewSettingsProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer(['layouts.app', 'includes.header', 'includes.footer'], function ($view) {
            $settings = Setting::pluck('value', 'key')->toArray();
            $view->with('settings', $settings);
        });
    }

    public function register(): void
    {
        //
    }
}