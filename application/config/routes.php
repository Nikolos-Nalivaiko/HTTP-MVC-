<?php
/* Маршруты сайта, 1-й параметр название страницы ("account/login"), в котором будетдва значения 
1. Контроллер (account) 
2. Экшн (login)
*/
return [

    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],

    'account/select' => [
        'controller' => 'account',
        'action' => 'select',
    ],

    'account/user-create' => [
        'controller' => 'account',
        'action' => 'userCreate',
    ],

    'account/company-create' => [
        'controller' => 'account',
        'action' => 'companyCreate',
    ],

    'cargo/add' => [
        'controller' => 'cargo',
        'action' => 'add',
    ],

    'cargo/list' => [
        'controller' => 'cargo',
        'action' => 'list',
    ],

    'cargo/info/(\d+)' => [
        'controller' => 'cargo',
        'action' => 'info',
    ],

];