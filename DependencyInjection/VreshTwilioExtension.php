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

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;

class VreshTwilioExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(array(__DIR__.'/../Resources/config')));
        $loader->load('config.yml');

        $configuration = new Configuration();
        $processor = new Processor();
        $config = $processor->processConfiguration($configuration, $configs);

        $container->getDefinition('twilio.api')->addArgument( $config );
    }
}
