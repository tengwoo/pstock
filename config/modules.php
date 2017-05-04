<?php


return [
    'user' => [
        'class' => 'dektrium\user\Module',
        'enablePasswordRecovery' => true,
        'enableUnconfirmedLogin' => false,
        'enableConfirmation' => true,
        'enableGeneratingPassword' => false,
        'enableRegistration' => true,
        'enableFlashMessages' => true,
        'admins' => ['superman', ],
    ],
];