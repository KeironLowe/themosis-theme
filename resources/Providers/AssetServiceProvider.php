<?php

namespace Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Themosis\Core\ThemeManager;
use Themosis\Support\Facades\Asset;

class AssetServiceProvider extends ServiceProvider
{


    /**
     * Theme Assets
     */
    public function register()
    {
        /** @var ThemeManager $theme */
        $theme = $this->app->make('wp.theme');

        // CSS
        Asset::add('styles', 'css/app.css', [], $theme->getHeader('version'))->to('front');

        // Scripts
        Asset::add('manifest', 'js/manifest.js', [], '/dist/js/manifest.js')->to('front');
        Asset::add('vendor', 'js/vendor.js', [], '/dist/js/vendor.js')->to('front');
        Asset::add('app', 'js/app.js', [], '/dist/js/app.js')->to('front');
    }
}
