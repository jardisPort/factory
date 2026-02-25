# JardisPort Factory

![Build Status](https://github.com/jardisCore/factory/actions/workflows/ci.yml/badge.svg)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.2-blue.svg)](https://www.php.net/)
[![PHPStan Level](https://img.shields.io/badge/PHPStan-Level%208-success.svg)](phpstan.neon)
[![PSR-4](https://img.shields.io/badge/autoload-PSR--4-blue.svg)](https://www.php-fig.org/psr/psr-4/)
[![PSR-12](https://img.shields.io/badge/code%20style-PSR--12-orange.svg)](phpcs.xml)

This package provides factory interfaces for a domain-driven design (DDD) approach.

## Installation

Install the package via Composer:

```bash
composer require jardisport/factory
```

## Requirements

- PHP >= 8.2

## Usage

The package provides a `FactoryInterface` that defines a standard method for creating objects with support for versioning, dynamic parameters, and shared (singleton) instances.

### Creating Objects

```php
use JardisPort\Factory\FactoryInterface;

// Get a new instance
$service = $factory->get(MyService::class);

// With a specific version
$service = $factory->get(MyService::class, 'v2');

// With constructor parameters
$service = $factory->get(MyService::class, null, $param1, $param2);
```

#### Parameters

- `$className`: The fully qualified class name to instantiate
- `$classVersion`: Optional version string for versioned class creation
- `...$parameters`: Variadic parameters passed to the class constructor

### Shared Instances

Register classes as shared to reuse the same instance per (className, version) combination:

```php
// Register a single class
$factory->registerShared(MyService::class);

// Register multiple classes
$factory->registerShared([MyService::class, AnotherService::class]);
```

Shared instances are instantiated once and reused on subsequent `get()` calls. Only use for stateless services — stateful objects (entities, DTOs, handlers with mutable state) must not be registered.

## Development

### Code Quality

The project uses PHPStan for static analysis and PHP_CodeSniffer for code style checks:

```bash
# Run PHPStan
vendor/bin/phpstan analyse

# Run PHP_CodeSniffer
vendor/bin/phpcs
```

### Pre-commit Hook

A pre-commit hook is automatically installed via Composer's post-install script to ensure code quality before commits.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

- Issues: [GitHub Issues](https://github.com/JardisPort/factory/issues)
- Email: devcore@headgent.dev

## Authors

- Jardis Core Development (jardisCore@headgent.dev)

## Keywords

- factory
- interfaces
- JardisPort
- Headgent
- DDD (Domain-Driven Design)
