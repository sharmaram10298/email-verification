<?php
return [
    'employee_validation' => [
            'name.required' => 'Please insert the name.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
        ],
    'login_validation' => [
        'email.required' => 'The email field is required.',
        'email.email' => 'The email must be a valid email address.',
        'password.required' => 'The password field is required.',
    ],
];