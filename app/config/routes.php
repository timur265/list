<?php

return [
    // MainController
    '' => [
        'controller' => 'Main',
        'action' => 'index',
    ],
    'main/index/{page:\d+}' => [
        'controller' => 'Main',
        'action' => 'index',
    ],
    // AdminController
    'admin/login' => [
        'controller' => 'Admin',
        'action' => 'login',
    ],
    'admin/logout' => [
        'controller' => 'Admin',
        'action' => 'logout',
    ],
    'main/add' => [
        'controller' => 'Main',
        'action' => 'add',
    ],
    'admin/edit' => [
        'controller' => 'Admin',
        'action' => 'edit',
    ],
    'admin/delete/{id:\d+}' => [
        'controller' => 'Admin',
        'action' => 'delete',
    ],
];