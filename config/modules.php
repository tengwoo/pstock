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
        'admins' => ['superman',],
        'layout' => '@app/modules/m/views/layouts/mobile',

//        'controllerMap' => [
//            'profile' => [
//                'class' => 'app\modules\m\controllers\user\ProfileController',
//            ],
//            'recovery' => [
//                'class' => 'app\modules\m\controllers\user\RecoveryController',
//            ],
//            'registration' => [
//                'class' => 'app\modules\m\controllers\user\RegistrationController',
//            ],
//            'security' => [
//                'class' => 'app\modules\m\controllers\user\SecurityController',
//            ],
//            'setting' => [
//                'class' => 'app\modules\m\controllers\user\SettingController',
//            ],
//        ],
    ],

    'm' => [ //移动版本界面
        'class' => 'app\modules\m\Module',
    ],
];