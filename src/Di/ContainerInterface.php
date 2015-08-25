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

/**
 * Dependency Injection Container Interface
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
interface ContainerInterface
{
    /**
     * @var string
     */
    const DI_CONTAINER = 'di.container.service';
}
