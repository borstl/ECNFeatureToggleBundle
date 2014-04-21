<?php

namespace Ecn\FeatureToggleBundle\DependencyInjection;

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
    $rootNode = $treeBuilder->root('ecn_feature_toggle');

    $rootNode
      ->children()
        ->arrayNode('features')->useAttributeAsKey('name')
          ->prototype('array')
            ->children()

                      ->scalarNode('voter')->defaultValue('AlwaysTrueVoter')->end()
                      ->variableNode('params')->defaultValue(array())->end()

            ->end()
          ->end()
        ->end()
      ->end()
    ->end();

    return $treeBuilder;
  }
}