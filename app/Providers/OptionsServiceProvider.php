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
        $acf->add_option_sub_page($this->app->namespace(), 'sitepilot-menu', [
            'page_title' => __('Theme Options', 'sp-theme')
        ]);

        $acf->add_option_fields($this->app->namespace(), [
            'title' => __('Theme', 'sp-theme'),
            'fields' => [
                [
                    'name' => 'example',
                    'type' => 'text',
                    'label' => __('Example Option', 'sp-theme')
                ]
            ]
        ]);
    }
}
