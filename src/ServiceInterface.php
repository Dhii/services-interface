<?php

declare(strict_types=1);

namespace Dhii\Services;

use Psr\Container\ContainerInterface;

/**
 * Represents a creatable service definition.
 */
interface ServiceInterface
{
    /**
     * Retrieves the keys of dependent services.
     *
     * @return string[] A list of strings each representing the key of a service.
     */
    public function getDependencies(): array;

    /**
     * Creates a copy of this service with different dependency keys.
     *
     * @param string[] $dependencies The new service dependency keys.
     *
     * @return static The newly created service instance.
     */
    public function withDependencies(array $dependencies);


    /**
     * Creates a value for this service using a given container for dependency resolution.
     *
     * @param ContainerInterface $c The container to use to resolve dependencies.
     *
     * @return mixed The created service value.
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ReturnTypeHint.MissingNativeTypeHint
     */
    public function __invoke(ContainerInterface $c);
}
