<?php
namespace App\Helpers;

class Validation {
    static public $userCreate = [
        'user_name' => [
            'label' => 'Rules.user_name',
            'rules' => 'required|string'
        ],
        'user_email' => [
            'label' => 'Rules.user_email',
            'rules' => 'required|valid_email'
        ],
        'user_password' => [
            'label' => 'Rules.user_password',
            'rules' => 'required|min_length[6]',
        ],
        'confirm_password' => [
            'label' => 'Rules.confirm_password',
            'rules' => 'required|matches[user_password]',
        ],
        'user_fone' => [
            'label' => 'Rules.user_fone',
            'rules' => 'required|regex_match[/^(?:(?:\+|00)?(55)\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/]'
        ] 
    ];

    static public $userUpdate = [
        'user_name' => [
            'label' => 'Rules.user_name',
            'rules' => 'required|string'
        ],
        'user_email' => [
            'label' => 'Rules.user_email',
            'rules' => 'required|valid_email'
        ],
        'user_password' => [
            'label' => 'Rules.user_password',
            'rules' => 'permit_empty|min_length[6]',
        ],
        'confirm_password' => [
            'label' => 'Rules.confirm_password',
            'rules' => 'required_with[user_password]|matches[user_password]',
        ],
        'user_fone' => [
            'label' => 'Rules.user_fone',
            'rules' => 'required|regex_match[/^(?:(?:\+|00)?(55)\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/]'
        ] 
    ];
}