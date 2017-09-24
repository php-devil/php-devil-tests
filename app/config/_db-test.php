<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 *
 * Соединение с базой данных, которое будет исползовано при запуске системных тестов
 * По умолчанию это то же сединение, в котором размещена база даных проекта
 */

$testDB = require __DIR__ . '/_db.php';
$testDB['dsn'] = 'mysql:host=localhost;dbname=phpdevil-phpunit;';
return $testDB;