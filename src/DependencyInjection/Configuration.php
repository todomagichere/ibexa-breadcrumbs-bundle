<?php

namespace Lzr\IbexaBreadcrumbsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('ibexa_breadcrumbs');
        $rootNode = $treeBuilder->getRootNode();
        $rootNode
            ->children()
            ->arrayNode('locations_rejected')->info("Locations in locations_rejected array wont be shown in the breadcrumb view")
                ->scalarPrototype()->end()
            ->end()
            ->arrayNode('contenttypes_rejected')->info("Content types names in contenttypes_rejected array wont be shown in the breadcrumb view")
                ->scalarPrototype()->end()
            ->end()
            ->end()

        ;

        return $treeBuilder;
    }
}
