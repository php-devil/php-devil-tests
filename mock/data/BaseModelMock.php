<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\mock\data;
use PhpDevil\data\Model;

/**
 * Тестовая модель формы
 *
 * @package PhpDevil\testing\mock\data
 * @author Alexey Volkov <avolkov.webwizardry@gmail.com>
 */
class BaseModelMock extends Model
{
    public static function rules()
    {
        return [
            [['name', 'email', 'phone'], 'required'],
        ];
    }
}