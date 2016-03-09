<?php
/**
 * This file is a part of mrprompt/silex-di-container-provider.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license   MIT
 */
namespace MrPrompt\Tests\Silex\Di;

use DerAlex\Silex\YamlConfigServiceProvider;
use MrPrompt\Silex\Di\Container as DiServiceProvider;
use MrPrompt\Tests\Silex\Resources\Foo;
use MrPrompt\Tests\Silex\Resources\Bar;
use PHPUnit_Framework_TestCase;
use Silex\Application;

/**
 * Container Provider Test
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class ContainerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    private $app;

    /**
     * Bootstrap
     */
    public function setUp()
    {
        parent::setUp();

        $app = new Application;
        $app->register(new YamlConfigServiceProvider(__DIR__ . '/../Resources/di.yml'));
        $app->register(new DiServiceProvider($app['config']['services']));

        $this->app = $app;
    }

    /**
     * Shutdown
     */
    public function tearDown()
    {
        $this->app = null;

        parent::tearDown();
    }

    /**
     * Test registration
     *
     * @test
     */
    public function registerMustBeCreateResources()
    {
        $this->assertArrayHasKey('service.bar', $this->app);
        $this->assertArrayHasKey('service.foo', $this->app);
    }

    /**
     * Test registration
     *
     * @test
     */
    public function getResourceDefinedMustBeReturnSameInstance()
    {
        $this->assertInstanceOf(Bar::class, $this->app['service.bar']);
        $this->assertInstanceOf(Foo::class, $this->app['service.foo']);
    }
}
