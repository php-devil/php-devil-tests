<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\tests\_helpers;
use PhpDevil\components\session\storage\MemoryStorage;
use PhpDevil\Devil;
use PhpDevil\web\Application;
use PHPUnit\Framework\TestCase;

/**
 * Class WebAppTestCase
 * Базовый класс для тестов, которые должны выполняться при сконфигурированном
 * фронт-контроллере приложения
 *
 * @package PhpDevil\testing\_helpers
 * @author Alexey Volkov <avolkov.webwizardry@gmail.com>
 */
class WebAppTestCase extends TestCase
{
    protected $app = null;

    protected function appConfig()
    {
        $config = require dirname(dirname(__DIR__)) . '/app/config/web.php';
        $config['components']['db'] = require dirname(dirname(__DIR__)) . '/app/config/_db-test.php';
        $config['components']['session']['name']    = 'phpunit';
        $config['components']['session']['storage'] = [
            'class' => MemoryStorage::class
        ];
        return $config;
    }

    protected function setUp()
    {
        ensureKernelConfigured();
        $this->app = new Application($this->appConfig());
    }

    protected function tearDown()
    {
        Devil::clearServices();
        $this->app = null;
        parent::tearDown();
    }
}