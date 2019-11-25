<?php

namespace Theme\Providers;

use Themosis\Support\Facades\Filter;
use Illuminate\Support\ServiceProvider;

class GutenbergServiceProvider extends ServiceProvider
{

    /**
     * Here we define the filters and actions which modify the admin pages.
     */
    public function register()
    {
        Filter::add('use_block_editor_for_post', '__return_false');
    }
}
