<?php

namespace App\Http\Requests\Admin;

class LoginRequest extends Request
{
    public function rules()
    {
        return [
            'account'   => 'required',
            'password'  => 'required|min:6|max:255',
        ];
    }
}
