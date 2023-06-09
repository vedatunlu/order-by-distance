<p align="center">
    <img src="https://img.shields.io/packagist/v/vedatunlu/order-by-distance">
    <img src="https://img.shields.io/packagist/dm/vedatunlu/order-by-distance">
    <img src="https://img.shields.io/github/repo-size/vedatunlu/order-by-distance">
    <img src="https://img.shields.io/github/last-commit/vedatunlu/order-by-distance">
    <img src="https://img.shields.io/github/release-date/vedatunlu/order-by-distance">
    <img src="https://img.shields.io/badge/licence-MIT-green">
</p>

# Laravel Payment

This package provides an elegant way to sort your model collection by distance.

## Installation

1. Use Composer to add the package to your project:

```bash
    composer require vedatunlu/order-by-distance
```

2. Add NearestTo trait to the model you want to use in your laravel project.

> Important: Your model should have 'latitude' and 'longitude' columns on the database.

# Basic Usage

```php
    Location::nearestTo(41.02488721726937, 29.015275681371868)
        ->get();
        
    Location::where('title', $title)
        ->nearestTo(41.02488721726937, 29.015275681371868)
        ->get();
```

# Contributing to the package

We welcome and appreciate your contributions to the package! The contribution guide can be found [here](https://github.com/vedatunlu/order-by-distance/blob/master/CONTRIBUTE.md).

## License

This package is open-sourced software licensed under the [MIT license](https://github.com/vedatunlu/order-by-distance/blob/master/LICENSE).
