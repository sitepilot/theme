let mix = require('laravel-mix');

mix.js('resources/js/theme.js', 'public/js')
    .postCss("resources/css/theme.pcss", 'public/css', [
        require('tailwindcss/nesting'),
        require('tailwindcss')
    ]);
