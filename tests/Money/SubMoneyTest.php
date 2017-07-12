<?php

/*
 * This file is part of the Atabix Money package.
 *
 * (c) Bryse Meijer <bryse.meijer@atabix.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Money;

use Atabix\Money\Money;
use Tests\TestCase;

class SubMoneyTest extends TestCase
{
    public function testItSubstractsTenFromTwenty()
    {
        $tenEuros = Money::parse('1000');
        $twentyEuros = Money::parse('2000');

        $this->assertEquals('€10,00', $twentyEuros->sub($tenEuros));
    }

    public function testItShouldProduceAFormattedDecimalValue()
    {
        $tenEuros = Money::parse('1000');
        $twentyFityEuros = Money::parse('2050');

        $this->assertEquals('€10,50', $twentyFityEuros->sub($tenEuros));
    }

    public function testItSubstractsAbnormalDecimalValues()
    {
        $tenEuros = Money::parse('1000.852');
        $twentyEuros = Money::parse('2000.153');

        $this->assertEquals('€9,99', $twentyEuros->sub($tenEuros));
    }
}
