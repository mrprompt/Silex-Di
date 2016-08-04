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
     * @param mixed $name
     */
    public function __construct($name = null)
    {
        $this->name = $name;
    }

    /**
    * @return string
    */
    public function getName()
    {
        return $this->name;
    }
}