# HdRouteLayouts Module for Zend Framework 2

Version 0.0.1 Created by [Martin Shwalbe](https://hounddog.github.com)

## Introduction

HdRouteLayouts is a very simple module that allows you to attach layout configuration to a route.

## Installation

### Main Setup

Installation of this module uses composer. For composer documentation, please refer to getcomposer.org.

```php
php composer.phar require hounddog/hd-route-layouts
# (When asked for a version, type `0.*`)
```
Then add HdRouteLayouts to your config/application.config.php

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