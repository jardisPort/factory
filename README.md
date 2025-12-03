# JardisPsr Factory

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
composer require jardispsr/factory
```

## Requirements

- PHP >= 8.2

## Usage

The package provides a `FactoryInterface` that defines a standard method for creating objects with support for versioning and dynamic parameters.

```php
use JardisPsr\Factory\FactoryInterface;

class MyFactory implements FactoryInterface
{
    /**
     * @template T
     * @param class-string<T> $className
     * @param ?string $classVersion
     * @param mixed ...$parameters
     * @return T|mixed
     */
    public function get(string $className, ?string $classVersion = null, ...$parameters): mixed
    {
        // Your factory implementation
        return new $className(...$parameters);
    }
}
```

### Parameters

- `$className`: The fully qualified class name to instantiate
- `$classVersion`: Optional version string for versioned class creation
- `...$parameters`: Variadic parameters passed to the class constructor

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

- Issues: [GitHub Issues](https://github.com/JardisPsr/factory/issues)
- Email: devcore@headgent.dev

## Authors

- Jardis Core Development (jardisCore@headgent.dev)

## Keywords

- factory
- interfaces
- JardisPsr
- Headgent
- DDD (Domain-Driven Design)
