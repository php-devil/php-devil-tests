<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\tests\_helpers;
use PhpDevil\web\Application;
use PHPUnit\Framework\TestCase;

/**
 * Class ApplicationTestCase
 * Тесты при сконфигурированном фронт-контроллере приложения
 *
 * @package PhpDevil\testing\tests\_helpers
 * @author Alexey Volkov <avolkov.webwizardry@gmail.com>
 */
abstract class ApplicationTestCase extends TestCase
{
    protected $app = null;

    protected function applicationConfig()
    {
        return require dirname(dirname(__DIR__)) . '/app/config/web.php';
    }

    protected function setUp()
    {
        ensureKernelConfigured();
        $this->app = new Application($this->applicationConfig());
    }

    protected function tearDown()
    {
        $this->app = null;
    }
}