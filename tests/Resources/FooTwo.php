<?php
namespace SilexFriends\Tests\Resources;

/**
 * Foo Two class
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class FooTwo
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @param mixed $name
     * @param array $parameters
     */
    public function __construct($name = null, array $parameters)
    {
        $this->name = $name;
        $this->parameters = $parameters;
    }

    /**
    * @return string
    */
    public function getName()
    {
        return $this->name;
    }

    public function getParameters()
    {
        return $this->parameters;
    }
}
