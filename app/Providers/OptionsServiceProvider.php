<?php

namespace Sitepilot\Theme\Providers;

use Sitepilot\WpTheme\Acf\AcfService;
use Sitepilot\Framework\Support\ServiceProvider;

class OptionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap theme services and hooks.
     */
    public function boot(AcfService $acf): void
    {
        $page_id = $this->app->namespace('options', '-');

        $acf->add_option_sub_page($page_id, 'sitepilot-menu', [
            'page_title' => 'Theme Options'
        ]);

        $acf->add_option_fields($page_id, __('General', 'sp-theme'), [[
            'name' => 'example_option',
            'type' => 'text'
        ]]);
    }
}
