<?php

/*
 * This file is part of the ECNFeatureToggle package.
 *
 * (c) Pierre Groth <pierre@elbcoast.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ecn\FeatureToggleBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 *
 * @author Pierre Groth <pierre@elbcoast.net>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ecn_feature_toggle');

        $rootNode
            ->children()
//                ->scalarNode('default_voter')->defaultValue('AlwaysTrueVoter')->end()
                ->arrayNode('default')
                    ->addDefaultsIfNotSet()
                    ->children()

                        ->scalarNode('voter')->defaultValue('AlwaysTrueVoter')->end()
                        ->variableNode('params')->defaultValue(array())->end()

                    ->end()
                ->end()
                ->arrayNode('features')->useAttributeAsKey('name')
                    ->prototype('array')
                        ->children()

                            ->scalarNode('voter')->defaultValue(null)->end()
                            ->variableNode('params')->defaultValue(array())->end()

                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
