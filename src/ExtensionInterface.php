<?php

declare(strict_types=1);

namespace Dhii\Services;

use Psr\Container\ContainerInterface;

/**
 * Represents a service extension.
 */
interface ExtensionInterface extends ServiceInterface
{
    /**
     * @inheritDoc
     *
     * @param mixed|null $prev The servie value to extend.
     */
    public function __invoke(ContainerInterface $c, $prev = null);
}
