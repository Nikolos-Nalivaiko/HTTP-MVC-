<?php
/* Маршруты сайта, 1-й параметр название страницы ("account/login"), в котором будетдва значения 
1. Контроллер (account) 
2. Экшн (login)
*/
return [

    // MainController
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    // AccountController
    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],
    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],

];