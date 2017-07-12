<?php

namespace Atabix\Money;

use Atabix\Money\Exceptions\UnexpectedCurrencyLocaleException;

class Currency
{
    /**
     * The current locale of the currency.
     *
     * @var \Atabix\Money\Locale
     */
    protected $locale;

    /**
     * @param \Atabix\Money\Locale $locale
     */
    public function __construct(Locale $locale)
    {
        $this->locale = $locale;
    }

    public static function spawn($currency, $locale)
    {
        $className = '\Atabix\Money\Currencies\\'.ucwords(strtolower($currency)).'Currency';

        if (!class_exists($className)) {
            throw new UnexpectedCurrencyLocaleException();
        }

        return new $className($locale);
    }

    public function name()
    {
        return $this->name;
    }

    public function plural()
    {
        return $this->namePlural;
    }

    public function code()
    {
        return $this->code;
    }

    public function symbol()
    {
        return $this->symbol;
    }

    public function decimals()
    {
        return $this->decimalPlaces;
    }

    public function decimalSeperator()
    {
        return $this->decimalPoint;
    }

    public function thousandsSeperator()
    {
        return $this->thousandsSeperator;
    }

    public function locale($locale)
    {
        $locales = $this->locales();

        if (empty($locales[$locale])) {
            throw new UnexpectedCurrencyLocaleException();
        }

        return $locales[$locale];
    }

    public function __get($property)
    {
        $locale = (string) $this->locale;

        return $this->locale($locale)[$property];
    }
}
