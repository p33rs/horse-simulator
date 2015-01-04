<?php
namespace horse\validators;
class HorseValidator extends AbstractValidator
{

    protected $rules = [
        'name' => 'required|min:4|max:255',
        'occupation' => 'max:255',
        'bio' => 'max:65536',
        'likes' => 'numeric|max:4294967295',
    ];

}