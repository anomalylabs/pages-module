<?php

return [
    'ttl' => [
        'type'   => 'anomaly.field_type.integer',
        'config' => [
            'min'  => 0,
            'step' => 60,
            'page' => 500
        ]
    ]
];
