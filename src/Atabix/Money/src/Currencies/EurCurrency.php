<?php

namespace Atabix\Money\Currencies;

use Atabix\Money\Currency;

class EurCurrency extends Currency
{
    /**
     * The ISO-4217 code of the currency.
     *
     * @see https://en.wikipedia.org/wiki/ISO_4217
     *
     * @var string
     */
    protected $code = 'EUR';

    /**
     * International name of the currency.
     *
     * @var string
     */
    protected $name = 'Euro';

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
    protected $numericCode = 978;

    public function getMinorUnit()
    {
        return $this->minorUnit;
    }

    public function locales()
    {
        return [
            'EN' => [
                'name' => 'Euro',
                'namePlural' => 'Euros',
                'decimalPlaces' => 2,
                'decimalPoint' => '.',
                'thousandsSeperator' => ',',
                'symbol' => '€',
                'positiveSign' => '',
                'negativeSign' => '-',
            ],
            'NL' => [
                'name' => 'Euro',
                'namePlural' => 'Euros',
                'decimalPlaces' => 2,
                'decimalPoint' => ',',
                'thousandsSeperator' => '.',
                'symbol' => '€',
                'positiveSign' => '',
                'negativeSign' => '-',
            ],
            'JA' => [
                'name' => 'ユーロ',
                'namePlural' => 'ユーロ',
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
