<?php

namespace Framework\Validate;

class RuleHandler
{
    public function required($value) : bool
    {
        return $value != '';
    }

    public function email($value) : bool
    {
        return (filter_var($value, FILTER_VALIDATE_EMAIL) != '');
    }

    public function regex($value) : bool
    {
        return $value != '' && preg_match('/^[A-Za-z0-9_.-]*$/', $value);
    }
}