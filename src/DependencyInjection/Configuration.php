<?php

declare(strict_types=1);

namespace Nistech\ContaoQualliIdClient\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public const ROOT_KEY = 'nistech_contao_qualliid_client';

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder(self::ROOT_KEY);

        $treeBuilder->getRootNode()
            ->children()
                ->booleanNode('disable_contao_core_backend_login')
                    ->defaultValue(false)
                ->end()
                ->booleanNode('enable_csrf_token_check')
                    ->defaultValue(true)
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
