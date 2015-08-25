<?php
/**
 * This file is a part of mrprompt/silex-di-container-provider.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license   MIT
 */
namespace MrPrompt\Tests\Silex\Resources;

/**
 * Foo class
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Foo
{
    /**
     * @param Bar $bar
     */
    public function __construct(Bar $bar)
    {
        // :)
    }
}