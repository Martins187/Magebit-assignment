<?php

namespace App\Requests;

use Framework\Request;

class UserDestroyRequest extends Request
{
    public function rules() : string
    {
        return 'required';
    }
}
