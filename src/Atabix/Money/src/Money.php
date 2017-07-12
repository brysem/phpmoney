<?php

namespace Atabix\Money;

class Money
{
    /**
     * Monetary value in its lowest unit.
     *
     * @var int
     */
    protected $value;

    /**
     * The currency representing the monetary value.
     *
     * @var int
     */
    protected $currency;

    /**
     * The current locale used for currencies.
     *
     * @var string
     */
    protected $locale;

    /**
     * @param int $value
     */
    public function __construct($value, $currency, $locale)
    {
        $this->locale = new Locale($locale, $currency);
        $this->currency = Currency::spawn($currency, $this->locale);
        $this->value = (int) round($value, 0, \PHP_ROUND_HALF_UP);
    }

    /**
     * Parses the monetary value of a string.
     *
     * @param mixed $value
     *
     * @return \Atabix\Money\Money
     */
    public static function parse($value, $locale = null, $currency = 'EUR')
    {
        $locale = empty($locale) ? setlocale(LC_ALL, 0) : $locale;

        $instance = new self($value, $currency, $locale);

        return $instance;
    }

    /**
     * Adds the monetary value of two Money instances together.
     *
     * @param mixed $value
     *
     * @return \Atabix\Money\Money
     */
    public function add($value)
    {
        $money = $this->getInstance($value);

        return self::parse($this->value() + $money->value());
    }

    /**
     * Subtracts the monetary value from a Money instance.
     *
     * @param mixed $value
     *
     * @return \Atabix\Money\Money
     */
    public function sub($value)
    {
        $money = $this->getInstance($value);

        return self::parse($this->value() - $money->value());
    }

    public function format($format)
    {
        $value = number_format(
            round($this->value() / 100, $this->currency->getMinorUnit()),
            $this->currency->decimals(),
            $this->currency->decimalSeperator(),
            $this->currency->thousandsSeperator()
        );

        $replacements = [
            '%s' => $this->currency->symbol(),
            '%C' => strtoupper($this->currency->code()),
            '%c' => strtolower($this->currency->code()),
            '%N' => $this->currency->name(),
            '%P' => $this->currency->plural(),
            '%n' => strtolower($this->currency->name()),
            '%p' => strtolower($this->currency->plural()),
            '%V' => $value,
            '%v' => round($this->value() / 100, $this->currency->getMinorUnit()),
        ];

        $formattedValue = $format;

        foreach ($replacements as $needle => $value) {
            $formattedValue = str_replace($needle, $value, $formattedValue);
        }

        return $formattedValue;
    }

    /**
     * Returns the monetary value in its lowest unit.
     *
     * @return int
     */
    public function value()
    {
        return (int) $this->value;
    }

    protected function getInstance($moneyValue)
    {
        if (!$moneyValue instanceof self) {
            $moneyValue = self::parse($moneyValue);
        }

        return $moneyValue;
    }

    public function __toString()
    {
        return $this->format('%s%V');
    }
}
