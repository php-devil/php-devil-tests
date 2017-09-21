<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\web;
use PhpDevil\components\session\Session;
use PhpDevil\testing\tests\_helpers\WebAppTestCase;
use PhpDevil\web\Application;

/**
 * Class ApplicationTest
 *
 * @property Application $app
 *
 * @package PhpDevil\testing\web
 * @author Alexey Volkov <avolkov.webwizardry@gmail.com>
 */
class ApplicationTest extends WebAppTestCase
{
    public function testAppCreated()
    {
        $this->assertInstanceOf(Application::class, $this->app);
    }

    public function testSessionInitialization()
    {
        $this->assertInstanceOf(Session::class, $this->app->session);
    }

    public function testAccessBetweenComponents()
    {
        $this->assertInstanceOf(Session::class, $this->app->user->getComponentOwner()->get('session'));
    }
}