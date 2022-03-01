<?php

namespace Sitepilot\Theme\Providers;

use Sitepilot\WpTheme\Acf\AcfService;
use Sitepilot\Framework\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    private AcfService $acf;

    /**
     * Register theme services.
     */
    public function register(): void
    {
        $this->add_filter_value('sitepilot/branding/enabled', true);
        $this->add_filter_value('sitepilot/client_role/enabled', true);
    }

    /**
     * Bootstrap theme services and hooks.
     */
    public function boot(): void
    {
        $this->add_action('wp_enqueue_scripts', 'enqueue_scripts', 15);
        $this->add_action('enqueue_block_editor_assets', 'enqueue_scripts', 15);
        $this->add_filter($this->app->namespace('template/slug'), 'filter_template_slug');
    }

    /**
     * Enqueue theme scripts and styles.
     */
    public function enqueue_scripts(): void
    {
        wp_enqueue_script($this->app->namespace(), $this->app->public_url('js/theme.js'), array(), $this->app->script_version(), true);
        wp_enqueue_style($this->app->namespace(), $this->app->public_url('css/theme.css'), array(), $this->app->script_version(), 'all');
    }

    /**
     * Include template by slug.
     */
    public function filter_template_slug(): ?string
    {
        if (is_single()) {
            //return 'single-post';
        }

        return null;
    }
}
