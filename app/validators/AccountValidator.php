<?php
namespace cram\validators;
class AccountValidator extends AbstractValidator
{

    protected $rules = [
        'email' => 'required|email|unique:users,email,{id}',
        'password' => 'min:8|max:255',
        'password2' => 'same:password',
    ];

}