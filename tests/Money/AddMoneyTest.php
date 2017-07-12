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

class AddMoneyTest extends TestCase
{
    public function testItAddsTwentyToTen()
    {
        $tenEuros = Money::parse('1000');
        $twentyEuros = Money::parse('2000');

        $this->assertEquals('€30,00', $tenEuros->add($twentyEuros));
    }

    public function testItShouldProduceAFormattedDecimalValue()
    {
        $tenEuros = Money::parse('1000');
        $twentyFiftyEuros = Money::parse('2050');

        $this->assertEquals('€30,50', $tenEuros->add($twentyFiftyEuros));
    }

    public function testItAddsAbnormalDecimalValues()
    {
        $tenEuros = Money::parse('1000.852');
        $twentyEuros = Money::parse('2000.153');

        $this->assertEquals('€30,01', $tenEuros->add($twentyEuros));
    }
}
