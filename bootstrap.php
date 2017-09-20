<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 *
 * Загрузчик тестовых сценариев
 */

require_once __DIR__ . '/vendor/autoload.php';
defined('TESTS_BOOTSTRAP_LOCATION') or define('TESTS_BOOTSTRAP_LOCATION', str_replace('\\', '/', __DIR__));

function ensureRootAlias(){
    if (\PhpDevil\Devil::ensureAliases()) {
        \PhpDevil\Devil::setPathOf('@web', __DIR__, '/');
    }
}

function ensureTranslations()
{
    if(\PhpDevil\Devil::ensureTranslations()) {
        \PhpDevil\Devil::setInterfaceLanguage('en');
    }
}
