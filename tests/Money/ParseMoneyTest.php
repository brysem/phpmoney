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

class ParseMoneyTest extends TestCase
{
    public function testItParsesADutchMoneyValue()
    {
        $this->money = Money::parse('100');

        $this->assertEquals('€1,00', (string) $this->money);
    }
}
