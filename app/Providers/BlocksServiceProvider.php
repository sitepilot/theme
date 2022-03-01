<?php

namespace Sitepilot\Theme\Providers;

use Sitepilot\WpTheme\Acf\AcfService;
use Sitepilot\Framework\Support\ServiceProvider;

class BlocksServiceProvider extends ServiceProvider
{
    /**
     * The ACF service instance.
     */
    private AcfService $acf;

    /**
     * Bootstrap theme services and hooks.
     */
    public function boot(AcfService $acf): void
    {
        $this->acf = $acf;

        $this->add_section_block();
    }

    /**
     * Add section block.
     */
    public function add_section_block(): void
    {
        $this->acf->add_block('sp-section', [
            'title' => __('Section', 'sp-theme'),
            'align' => 'full',
            'supports' => [
                'align' => ['full'],
                'jsx' => true,
                'color' => [
                    'background' => true
                ]
            ],
            'styles' => [
                ['name' => 'small', 'label' => 'Small']
            ],
            'render_callback' => [$this, 'render_section_block']
        ]);

        $this->acf->add_block_fields('sp-section', [
            [
                'name' => 'example',
                'type' => 'text',
                'label' => 'Example Field'
            ]
        ]);
    }

    /**
     * Render section block.
     */
    public function render_section_block(array $block): void
    {
        echo $this->acf->block_template('resources/blocks/section', $block);
    }
}
