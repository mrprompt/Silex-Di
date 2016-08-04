<?php
namespace SilexFriends\Tests\Di;

use DerAlex\Silex\YamlConfigServiceProvider;
use SilexFriends\Di\Container as DiServiceProvider;
use SilexFriends\Tests\Resources\Foo;
use SilexFriends\Tests\Resources\Bar;
use SilexFriends\Tests\Resources\FooTwo;
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
        $this->assertArrayHasKey('service.foo-two', $this->app);
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
        $this->assertInstanceOf(FooTwo::class, $this->app['service.foo-two']);
    }

    /**
     * @test
     */
     public function getNameFromFooTwo()
     {
         $name = 'hello';

         $result = $this->app['service.foo-two']->getName();

         $this->assertEquals($name, $result);
     }

     /**
      * @test
      */
      public function getParametersFromFooTwo()
      {
          $expected = ["param1" => "hello", "param2" => "world"];
          $result   = $this->app['service.foo-two']->getParameters();

          $this->assertEquals($expected, $result);
      }
}
