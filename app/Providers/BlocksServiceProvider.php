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

        $this->add_container_block();
    }

    /**
     * Add container block.
     */
    public function add_container_block(): void
    {
        $this->acf->add_block('sp-container', [
            'title' => __('Container', 'sp-theme'),
            'align' => 'full',
            'supports' => [
                'jsx' => true,
                'color' => [
                    'background' => true
                ]
            ],
            'render_callback' => [$this, 'render_container_block']
        ]);

        $this->acf->add_block_fields('sp-container', [
            [
                'name' => 'style',
                'type' => 'accordion',
                'label' => 'Style'
            ],
            [
                'name' => 'padding_y',
                'type' => 'sp_class_select',
                'label' => 'Padding Y',
                'choices' => [
                    'none' => ['label' => 'None', 'class' => ''],
                    'sm' => ['label' => 'Small', 'class' => 'sp-py-2 md:sp-py-4'],
                    'md' => ['label' => 'Medium', 'class' => 'sp-py-4 md:sp-py-8'],
                    'lg' => ['label' => 'Large', 'class' => 'sp-py-8 md:sp-py-16'],
                    'xl' => ['label' => 'XL', 'class' => 'sp-py-16 sp-py-32']
                ],
                'default_choice' => 'lg'
            ],
            [
                'name' => 'max_width',
                'type' => 'sp_class_select',
                'label' => 'Max Width',
                'choices' => [
                    'sm' => ['label' => 'Small', 'class' => 'sp-max-w-sm'],
                    'md' => ['label' => 'Medium', 'class' => 'sp-max-w-md'],
                    'lg' => ['label' => 'Large', 'class' => 'sp-max-w-lg'],
                    'xl' => ['label' => 'XL', 'class' => 'sp-max-w-xl']
                ]
            ],
            [
                'name' => 'shadow',
                'type' => 'sp_class_select',
                'label' => 'Shadow',
                'choices' => [
                    'sm' => ['label' => 'Small', 'class' => 'sp-shadow-sm'],
                    'md' => ['label' => 'Medium', 'class' => 'sp-shadow-md'],
                    'lg' => ['label' => 'Large', 'class' => 'sp-shadow-lg'],
                    'xl' => ['label' => 'XL', 'class' => 'sp-shadow-xl']
                ]
            ],
            [
                'name' => 'border_radius',
                'type' => 'sp_class_select',
                'label' => 'Border Radius',
                'choices' => [
                    'sm' => ['label' => 'Small', 'class' => 'sp-rounded'],
                    'md' => ['label' => 'Medium', 'class' => 'sp-rounded-md'],
                    'lg' => ['label' => 'Large', 'class' => 'sp-rounded-lg'],
                    'xl' => ['label' => 'Full', 'class' => 'sp-rounded-full']
                ]
            ]
        ]);
    }

    /**
     * Render container block.
     */
    public function render_container_block(array $block): void
    {
        $data = [
            'class' => $this->acf->dynamic_class([
                'sp-px-8',
                'sp-container',
                'field:max_width',
                'field:padding_y'
            ]),
            'html' => $this->acf->inner_blocks_html()
        ];

        echo $this->acf->block_template('resources/blocks/container', $block, $data, [
            'field:shadow',
            'field:border_radius'
        ]);
    }
}
