<?php

namespace Atabix\Money\Exceptions;

use RuntimeException;

class UnexpectedCurrencyLocaleException extends RuntimeException
{
    protected $message = 'The locale is not supported by this currency.';
}
