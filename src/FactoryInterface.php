<?php

declare(strict_types=1);

namespace JardisPort\Factory;

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

    /**
     * Registers one or more classes as shared (singleton per version).
     *
     * Shared classes are instantiated once per (resolvedClassName, version)
     * combination and reused on subsequent get() calls.
     *
     * Only use for stateless services. Stateful objects (entities, DTOs,
     * handlers with mutable state) must NOT be registered.
     *
     * @param string|array<string> $classNames One or more FQCNs to register
     */
    public function registerShared(string|array $classNames): void;
}
