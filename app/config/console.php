<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

$config = require __DIR__ . '/common.php';

$config['modules']['migrate'] = [
    'class' => \PhpDevil\modules\migrate\MigrateModule::class,
];

return $config;