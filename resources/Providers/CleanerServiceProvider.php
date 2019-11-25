<?php

namespace Theme\Providers;

use Themosis\Support\Facades\Action;
use Themosis\Support\Facades\Filter;
use Illuminate\Support\ServiceProvider;

class CleanerServiceProvider extends ServiceProvider
{


    /**
     * Theme Cleaning
     *
     * Initiates the various actions and filters which clean's up the default
     * templates to remove a lot of the crud.
     */
    public function register()
    {

        // Actions
        Action::add('after_setup_theme', [$this, 'removeEmojis']);
        Action::add('after_setup_theme', [$this, 'removeHeaderMeta']);
        Action::add('wp_print_styles', [$this, 'removeGutenbergStyles'], 100);

        // Filters
        Filter::add('show_admin_bar', '__return_false');
    }


    /**
     * Removes the emoji support scripts from the <head>.
     *
     * @return void
     */
    public function removeEmojis(): void
    {
        Action::remove('wp_head', 'print_emoji_detection_script', 7);
        Action::remove('admin_print_scripts', 'print_emoji_detection_script');
        Action::remove('wp_print_styles', 'print_emoji_styles');
        Action::remove('admin_print_styles', 'print_emoji_styles');
    }


    /**
     * Removes various meta tags from the <head>
     *
     * @return void
     */
    public function removeHeaderMeta(): void
    {
        Action::remove('wp_head', 'wp_resource_hints', 2);
        Action::remove('wp_head', 'rsd_link');
        Action::remove('wp_head', 'wlwmanifest_link');
        Action::remove('wp_head', 'wp_generator');
        Action::remove('wp_head', 'wp_oembed_add_host_js');
        Action::remove('wp_head', 'wp_oembed_add_discovery_links');
        Action::remove('wp_head', 'rest_output_link_wp_head');
        Action::remove('wp_head', 'feed_links_extra', 3);
    }


    /**
     * Removes the styles bunded with Gutenberg
     *
     * @return void
     */
    public function removeGutenbergStyles(): void
    {
        wp_dequeue_style('wp-block-library');
    }
}
