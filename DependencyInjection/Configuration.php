<?php

namespace Symfony\Cmf\Bundle\CreateBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('symfony_cmf_create');

        $rootNode
            ->children()
                ->arrayNode('map')
                    ->useAttributeAsKey('name')
                    ->prototype('scalar')->end()
                ->end()
                ->scalarNode('role')->defaultValue('IS_AUTHENTICATED_ANONYMOUSLY')->end()
                ->scalarNode('image_class')->defaultNull()->end()
                ->scalarNode('phpcr')->defaultFalse()->end()
                ->scalarNode('phpcr_odm')->defaultFalse()->end()
                ->scalarNode('orm')->defaultFalse()->end()
                ->scalarNode('stanbol_url')->defaultValue('http://dev.iks-project.eu:8081')->end()
                ->scalarNode('use_coffee')->defaultFalse()->end()
                ->scalarNode('base_path')->defaultValue('/')->end()
                ->scalarNode('cms_path')->defaultValue('/')->end()
                ->arrayNode('rdf_config_dirs')
                    ->useAttributeAsKey('dir')
                    ->prototype('scalar')->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
