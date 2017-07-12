<?php

namespace Atabix\Money;

class Locale
{
    /**
     * The locale's 2 letter code.
     *
     * @var string
     */
    protected $code;

    /**
     * The locale's 2 letter code.
     *
     * @var string
     */
    protected $currency;

    /**
     * The locale's configuration.
     *
     * @var array
     */
    protected $config;

    public function __construct($code)
    {
        $this->code = strtoupper(substr($code, 0, 2));
    }

    public function __toString()
    {
        return $this->code;
    }
}
