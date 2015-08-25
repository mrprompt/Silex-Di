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
     * @see \Silex\ServiceProviderInterface::register()
     */
    public function register(Application $app)
    {
        foreach ($app['config']['services'] as $serviceName => $serviceDetails) {
            /* @var $classService string */
            $service     = array_shift($serviceDetails);

            // others parameters
            $param1      = $param2 = $param3 = $param4 = null;

            $param1      = array_shift($serviceDetails);
            $param2      = array_shift($serviceDetails);
            $param3      = array_shift($serviceDetails);
            $param4      = array_shift($serviceDetails);

            $dep1 = !empty($param1) ? $app[ $param1 ] : null;
            $dep2 = !empty($param2) ? $app[ $param2 ] : null;
            $dep3 = !empty($param3) ? $app[ $param3 ] : null;
            $dep4 = !empty($param4) ? $app[ $param4 ] : null;

            $app[$serviceName] = $app->share(
                function () use ($service, $dep1, $dep2, $dep3, $dep4) {
                    return new $service($dep1, $dep2, $dep3, $dep4);
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
