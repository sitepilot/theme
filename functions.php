<?php

use Sitepilot\Framework\Foundation\Application;

if (!defined('ABSPATH')) exit;

require __DIR__ . '/vendor/autoload.php';

if (!class_exists(Application::class)) {
    return add_action('admin_notices', function () {
        echo '<div class="notice notice-error"><p>You need to install <a href="https://github.com/sitepilot/sitepilot" target="_blank">Sitepilot</a> to use the activated theme.</p></div>';
    });
}

new Application(basename(__DIR__), __FILE__, [
    // Theme service providers
    \Sitepilot\Theme\Providers\ThemeServiceProvider::class,
    \Sitepilot\Theme\Providers\BlocksServiceProvider::class,
    \Sitepilot\Theme\Providers\OptionsServiceProvider::class,

    // Package service providers
    \Sitepilot\WpTheme\Acf\AcfServiceProvider::class,
    \Sitepilot\WpTheme\Post\PostServiceProvider::class,
    \Sitepilot\WpTheme\Template\TemplateServiceProvider::class,
    //\Sitepilot\WpTheme\BeaverBuilder\BeaverBuilderServiceProvider::class,
]);

if (!function_exists('sp_theme')) {
    function sp_theme(): ?Application
    {
        return Application::app(
            basename(__DIR__)
        );
    }
}
