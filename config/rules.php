<?php

return [
    'employee_validation' => [
        'name' => 'required',
        'email' => 'required|email|unique:employees,email',
        'password' => 'required'
    ],
    'login_validation' => [
        'email' => 'required|email',
        'password' => 'required'
    ]
];