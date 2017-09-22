<?php
/**
 * @link http://www.php-devil.ru/
 * @copyright Copyright (c) 2017 Web Wizardry
 * @license http://www.php-devil.ru/license/
 */

namespace PhpDevil\testing\base\scalar;
use PhpDevil\base\scalar\ArrayHelper;
use PhpDevil\components\db\Connection;
use PhpDevil\components\user\User;
use PHPUnit\Framework\TestCase;

class ArrayHelperMergeTest extends TestCase
{
    private $default = [
        'components' => [
            'db' => [
                'class' => Connection::class,
            ],

            'user' => [
                'class' => User::class,
            ],
        ],
    ];

    private $actual = [
        'components' => [
            'db' => [
                'dsn' => 'mysql:host=localhost;'
            ]
        ]
    ];

    private $correct = [
        'components' => [
            'db' => [
                'class' => Connection::class,
                'dsn' => 'mysql:host=localhost;'
            ],

            'user' => [
                'class' => User::class,
            ],
        ],
    ];


    public function testMergingIsCorrect()
    {
        $this->assertEquals($this->correct, ArrayHelper::mergeRecursively($this->default, $this->actual));
    }
}