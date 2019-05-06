<?php

return [
    'service_manager' => [
        'invokables' => [
            'ZFNotification\Adapter\Factory\ZFNotificationAdapterFactory' =>
                'ZFNotification\Adapter\Factory\ZFNotificationAdapterFactory',
            'ZFNotification\Adapter\ZFNotificationAdapter' =>
                'ZFNotification\Adapter\ZFNotificationAdapter',    
        ],
        'shared' => [
            'ZFNotification\Adapter\Factory\ZFNotificationAdapterFactory' => false
        ],
    ],
];
