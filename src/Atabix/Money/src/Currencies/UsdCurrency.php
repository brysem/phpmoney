<?php

namespace Atabix\Money\Currencies;

use Atabix\Money\Currency;

class UsdCurrency extends Currency
{
    /**
     * The ISO-4217 code of the currency.
     *
     * @see https://en.wikipedia.org/wiki/ISO_4217
     *
     * @var string
     */
    protected $code = 'USD';

    /**
     * International name of the currency.
     *
     * @var string
     */
    protected $name = 'United States Dollar';

    /**
     * The decimal length of the currency.
     *
     * @var int
     */
    protected $minorUnit = 2;

    /**
     * The ISO-4217 number of the currency.
     *
     * @see https://en.wikipedia.org/wiki/ISO_4217
     *
     * @var int
     */
    protected $numericCode = 840;

    public function getMinorUnit()
    {
        return $this->minorUnit;
    }

    public function locales()
    {
        return [
            'EN' => [
                'name' => 'Dollar',
                'namePlural' => 'Dollars',
                'decimalPlaces' => 2,
                'decimalPoint' => '.',
                'thousandsSeperator' => ',',
                'symbol' => '$',
                'positiveSign' => '',
                'negativeSign' => '-',
            ],
            'NL' => [
                'name' => 'Dollar',
                'namePlural' => 'Dollars',
                'decimalPlaces' => 2,
                'decimalPoint' => ',',
                'thousandsSeperator' => '.',
                'symbol' => '$',
                'positiveSign' => '',
                'negativeSign' => '-',
            ],
            'JA' => [
                'name' => 'ドル',
                'namePlural' => 'ドル',
                'decimalPlaces' => 2,
                'decimalPoint' => '.',
                'thousandsSeperator' => ',',
                'symbol' => '€',
                'positiveSign' => '',
                'negativeSign' => '-',
            ],
        ];
    }
}
