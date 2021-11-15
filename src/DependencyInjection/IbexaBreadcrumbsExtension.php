<?php

namespace Lzr\IbexaBreadcrumbsBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class IbexaBreadcrumbsExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        $loader->load('services.yaml');

        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $definition = $container->getDefinition('ibexa_breadcrumbs');
        $definition->setArgument(2, $config['locations_rejected']);
        $definition->setArgument(3, $config['contenttypes_rejected']);

    }

    public function getConfiguration(array $config, ContainerBuilder $container)
    {
        return parent::getConfiguration($config, $container);
    }

    public function getAlias()
    {
        return 'ibexa_breadcrumbs';
    }
}