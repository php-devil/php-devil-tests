<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\tests\base\aliases;

use PhpDevil\base\aliases\InvalidAliasException;
use PhpDevil\base\aliases\renderers\Translation;
use PhpDevil\Devil;
use PHPUnit\Framework\TestCase;

class AliasManagerTest extends TestCase
{
    public function setUp()
    {
        ensureRootAlias();
        ensureTranslations();
        Devil::setInterfaceLanguage('ru');
    }

    public function testStandaloneShortcut()
    {
        $this->assertEquals(TESTS_BOOTSTRAP_LOCATION, Devil::getPathOf('@web'));
    }

    public function testCorrectAlias()
    {
        $this->assertEquals(TESTS_BOOTSTRAP_LOCATION . '/css/site.css', Devil::getPathOf('@web/css/site.css'));
    }

    public function testCorrectUrl()
    {
        $this->assertEquals('/css/site.css', Devil::getUrlOf('@web/css/site.css'));
    }

    public function testExceptionThrown()
    {
        $this->expectExceptionMessage('Неизвестный псевдоним пути @unknown');
        Devil::getPathOf('@unknown');
    }

    public function testExceptionThrown2()
    {
        $this->expectExceptionMessage("Псевдоним пути unknown должен начинаться с символа '@'");
        Devil::getPathOf('unknown');
    }

    public function testLanguagePathRender()
    {
        $corePath = Devil::getPathOf('@core');
        $expected = $corePath . '/' . Translation::MESS_DIR_NAME . '/ru/exceptions';
        $this->assertEquals($expected, Devil::getPathOf('@core{...}exceptions', ['renderer'=>'translation', 'language' => 'ru']));
    }

    public function testNewAliasIsSet()
    {
        Devil::setPathOf('@new', str_replace('\\', '/', __DIR__), 'http://example.com');
        $this->assertEquals(str_replace('\\', '/', __DIR__) . '/some/file.txt', Devil::getPathOf('@new/some/file.txt'));
        $this->assertEquals('http://example.com/some/file.txt', Devil::getUrlOf('@new/some/file.txt'));
    }

    public function testUrlOnlyAlias()
    {
        Devil::setPathOf('@yandex', null, 'http://yandex.ru');
        $this->assertEquals('http://yandex.ru/?q=test', Devil::getUrlOf('@yandex/?q=test'));
        $this->expectException(InvalidAliasException::class);
        Devil::getPathOf('@yandex');
    }
}