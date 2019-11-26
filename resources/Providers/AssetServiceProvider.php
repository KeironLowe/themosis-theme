<?php

namespace Theme\Providers;

use App\Resource;
use Themosis\Core\ThemeManager;
use Illuminate\Support\ServiceProvider;

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
        Resource::asset('styles', 'css/app.css')->to('front');

        // Scripts
        Resource::asset('manifest', 'js/manifest.js', [], true)->to('front');
        Resource::asset('vendor', 'js/vendor.js', [], true)->to('front');
        Resource::asset('app', 'js/app.js', [], true)->to('front');
    }
}
