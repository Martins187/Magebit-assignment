<?php

namespace Framework\Validate;

/**
 * Defining all the related validation rules.
 */
class RuleHandler
{
    public function required($value) : bool
    {
        return $value != '';
    }

    public function email($value)
    {
        return (filter_var($value, FILTER_VALIDATE_EMAIL) != '');
    }
}