<?php

namespace App\Requests;

use Framework\Request;

class UserStoreRequest extends Request
{
    public function rules(): array
    {
        return [
            'email'          => 'required|email',
            'email_provider' => 'required|regex'
        ];
    }
}