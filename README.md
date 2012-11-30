# HdRouteLayouts Module for Zend Framework 2

Version 0.0.1 Created by [Martin Shwalbe](https://hounddog.github.com)

## Introduction

HdRouteLayouts is a very simple module that allows you to attach layout configuration to a route.

## Installation

### Main Setup

1. Clone this project into your `./vendor/` directory and enable it in your
   `application.config.php` file.

## Usage


Using HdRouteLayouts is very, very simple. In any module config or autoloaded
config file simply specify the following:

```php
array(
    'route_layouts' => array(
        'my/route' => 'layout/some-layout',
    ),
);
```