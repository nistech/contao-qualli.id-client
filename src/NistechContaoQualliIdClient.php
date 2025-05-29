<?php

declare(strict_types=1);

namespace Nistech\ContaoQualliIdClient;

use Nistech\ContaoQualliIdClient\DependencyInjection\NistechContaoQualliIdClientExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NistechContaoQualliIdClient extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getContainerExtension(): NistechContaoQualliIdClientExtension
    {
        return new NistechContaoQualliIdClientExtension();
    }

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
    }
}
