# Starter Theme

WordPress starter theme with a modern development workflow.

## Features

* Harness the power of dependency injection thanks to [Sitepilot](https://github.com/sitepilot/sitepilot-plugin)
* Compile theme assets with [Laravel Mix](https://laravel-mix.com)
* Out of the box support for [TailwindCSS](https://tailwindcss.com/)
* Build and deploy theme files with a [GitHub Actions](.github/workflows/build.yml)

## Requirements

* [Sitepilot](https://github.com/sitepilot/sitepilot-plugin)
* [PHP](https://www.php.net/manual/en/install.php) >= 7.4 
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/)

## Installation

Install this theme using Composer from your WordPress themes directory (replace `theme-name` below with the name of your theme):

```bash
composer create-project sitepilot/theme <theme-name>
```

_Optional: replace `template: astra` in `style.css` with another theme or remove this line to start from scratch._

## Development

This theme [implements](./functions.php) the application service container provided by our [Sitepilot](https://github.com/sitepilot/sitepilot-plugin/) plugin. The service container is a powerful tool for managing class dependencies, performing dependency injection and registering [service providers](./app/Providers/). More information about the service container and service providers can be found [here](https://github.com/sitepilot/sitepilot-plugin/).
