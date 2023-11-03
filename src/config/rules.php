<?php 

// Инструкции для валидатора

return [
        'required' => ['name', 'phone_number', 'email', 'login', 'password', 'check_password'],
        'lengthBetween' => [
            ['name', 1, 50],
            ['phone_number', 11, 15],
            ['email', 1, 50],
            ['login', 1, 50],
            ['password', 8, 50],
        ],
        'email' => ['email'],
        'equals' => [
            ['password', 'check_password'],
        ],
    ];
