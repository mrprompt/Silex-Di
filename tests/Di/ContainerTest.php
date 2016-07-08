<?php
namespace SilexFriends\Tests\Di;

use DerAlex\Silex\YamlConfigServiceProvider;
use SilexFriends\Di\Container as DiServiceProvider;
use SilexFriends\Tests\Resources\Foo;
use SilexFriends\Tests\Resources\Bar;
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
