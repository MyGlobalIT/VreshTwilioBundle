<?php
/*
* This file is part of the VreshTwilio package.
*
* (c) Frido Koch <frido@vresh.net
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
namespace Vresh\TwilioBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{



    /**
* Generates the configuration tree.
*
* @return TreeBuilder
*/
    public function getConfigTreeBuilder()
    { 
        $treeBuilder = new TreeBuilder('twilio');
        $root = $treeBuilder->getRootNode()->children();
        $root->scalarNode('sid')->defaultValue('')->end()
            ->scalarNode('authToken')->defaultValue('')->end()
            ->scalarNode('version')->defaultValue('2010-04-01')->end()
            ->scalarNode('retryAttempts')->defaultValue('1')->end()
        ->end();

        return $treeBuilder;
    }
}

