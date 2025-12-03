<?php

declare(strict_types=1);

namespace JardisPsr\Factory;

interface FactoryInterface
{
    /**
     * @template T
     * @param class-string<T> $className
     * @param ?string $classVersion
     * @param mixed ...$parameters
     * @return T|mixed
     */
    public function get(string $className, ?string $classVersion = null, ...$parameters): mixed;
}
