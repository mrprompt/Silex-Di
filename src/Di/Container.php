<?php
/**
 * This file is a part of mrprompt/silex-di-container-provider.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license   MIT
 */
namespace MrPrompt\Silex\Di;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Dependency Injection Container
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
final class Container implements ContainerInterface, ServiceProviderInterface
{
    /**
     * @var $array
     */
    private $services;

    /**
     * Constructor
     */
    public function __construct(array $container)
    {
        $this->services = $container;
    }

    /**
     * @see \Silex\ServiceProviderInterface::register()
     */
    public function register(Application $app)
    {
        foreach ($this->services as $serviceName => $serviceDetails) {
            /* @var $classService string */
            $service = array_shift($serviceDetails);

            /* @var $args array */
            $args = array_map(function($row) use($app) {
                return $app[$row];
            }, $serviceDetails);

            $app[$serviceName] = $app->share(
                function () use ($service, $args) {
                    return new $service(... $args);
                }
            );
        }
    }

    /**
     * @see \Silex\ServiceProviderInterface::boot()
     */
    public function boot(Application $app)
    {
        // :)
    }
}
