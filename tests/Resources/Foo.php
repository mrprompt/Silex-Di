<?php
namespace MrPrompt\Tests\Silex\Di\Resources;

class Foo
{
    /**
     * @param Bar $bar
     */
    public function __construct(Bar $bar)
    {
        echo $bar->getName();
    }
}