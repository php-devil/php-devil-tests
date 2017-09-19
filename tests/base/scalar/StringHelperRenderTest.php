<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\tests\base\scalar;
use PhpDevil\base\scalar\StringHelper;
use PHPUnit\Framework\TestCase;

class StringHelperRenderTest extends TestCase
{
    protected function assertRenderingIsCorrect($expected, $template, array $arguments = [])
    {
        $this->assertEquals($expected, StringHelper::render($template, $arguments));
    }

    /**
     * При передачи шаблона строки без аргументов шаблон должен быть возвращен
     * без изменений
     */
    public function testStringWithoutArguments()
    {
        $this->assertRenderingIsCorrect(
            'Expected string',
            'Expected string'
        );
    }

    /**
     * Есди аргументов меньше, плейсхолдеры без сооветвтующих аргументов должны быть
     * возвращены как есть в шаблоне вместе с фигурными скобками
     */
    public function testIfArgumentsFew()
    {
        $this->assertRenderingIsCorrect(
            'Expected one string {two}',
            'Expected {one} string {two}',
            ['one' => 'one']
        );
    }

    /**
     * При совпадении аргументов все должны быть подставлены в шаблон
     */
    public function testIfArgumentsCountMatches()
    {
        $this->assertRenderingIsCorrect(
            'Expected one string two',
            'Expected {one} string {two}',
            ['one' => 'one', 'two' => 'two']
        );
    }

    /**
     * При наличии аргументов, для которых нет плейсхолдеров, они должны быть
     * проигнорированы
     */
    public function testIfArgumentsMany()
    {
        $this->assertRenderingIsCorrect(
            'Expected one string two',
            'Expected {one} string {two}',
            ['one' => 'one', 'two' => 'two', 'three' => 'three']
        );
    }

    /**
     * Один плейсхолдер с одним и тем же значением может быть использован
     * не ограниченное количество раз
     */
    public function testPlaceholdersMultipleUsage()
    {
        $this->assertRenderingIsCorrect(
            'Expected one one string one',
            'Expected {one} {one} string {one}',
            ['one' => 'one']
        );
    }

}