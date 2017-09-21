<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace app\controllers;
use PhpDevil\web\controllers\WebController;

class DefaultController extends WebController
{
    public function actionIndex()
    {
        echo 'index action';
    }
}