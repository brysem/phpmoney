<?php

/*
 * This file is part of the Atabix Money package.
 *
 * (c) Bryse Meijer <bryse.meijer@atabix.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public static function setUpBeforeClass()
    {
        setlocale(LC_ALL, 'nl_NL.UTF-8');
    }

    public static function tearDownAfterClass()
    {
        //
    }
}
