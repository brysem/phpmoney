<?php

namespace Atabix\Money\Exceptions;

use RuntimeException;

class InvalidCurrencyAssignmentException extends RuntimeException
{
    protected $message = 'The assigned currency is not supported.';
}
