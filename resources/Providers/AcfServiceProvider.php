<?php

namespace Theme\Providers;

use Illuminate\Support\ServiceProvider;

class AcfServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->addOptionPages();
    }



    /**
     * Adds the option pages into the CMS.
     *
     * @return void
     */
    private function addOptionPages(): void
    {
        if (!function_exists('acf_add_options_page')) {
            return;
        }

        acf_add_options_page(array(
            'page_title' => 'Site Settings',
            'menu_title' => 'Site Settings',
            'menu_slug'  => 'site-settings',
            'capability' => 'edit_posts',
        ));
    }
}
