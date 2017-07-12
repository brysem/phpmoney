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

class FormatMoneyTest extends TestCase
{
    public function testItFormatsMoneyGreaterThanThousand()
    {
        $money = Money::parse('100000');

        $this->assertEquals('€1.000,00', (string) $money);
    }

    public function testItFormatsMoneyInEnglish()
    {
        $this->money = Money::parse('100000', 'en');

        $this->assertEquals('€1,000.00', (string) $this->money);
    }

    public function testItFormatsMoneyInJapanese()
    {
        $this->money = Money::parse('100000', 'ja');

        $this->assertEquals('€1,000.00', (string) $this->money);
    }

    public function testItFormatsMoneyWithCode()
    {
        $this->money = Money::parse('100000');

        $this->assertEquals('EUR 1.000,00', $this->money->format('%C %V'));
    }

    public function testItFormatsMoneyInASentence()
    {
        $this->money = Money::parse('100000');

        $this->assertEquals('I have 1000 euros.', $this->money->format('I have %v %p.'));
    }

    public function testItFormatsMoneyInSentenceWithEscapedValues()
    {
        $this->money = Money::parse('100');

        $this->assertEquals('There was a pig which had 1 euro.', $this->money->format('There was a pig which had %v %n.'));
    }
}
