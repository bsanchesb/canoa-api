<?php

return [
    'ApiRequest' => [
        'debug' => false,
        'responseType' => 'json',
        'xmlResponseRootNode' => 'response',
    	'responseFormat' => [
            'statusKey' => 'status',
            'statusOkText' => 'success',
            'statusNokText' => 'error',
            'resultKey' => 'result',
            'messageKey' => 'message',
            'defaultMessageText' => 'Empty response!',
            'errorKey' => 'error',
            'defaultErrorText' => 'Unknown request!'
        ],
        'log' => false,
	'logOnlyErrors' => true,
        'logOnlyErrorCodes' => [404, 500],
        'jwtAuth' => [
            'enabled' => false,
            'cypherKey' => 'R1a#2%dY2fX@3g8r5&s4Kf6*sd(5dHs!5gD4s',
            'tokenAlgorithm' => 'HS256'
        ],
        'cors' => [
            'enabled' => true,
            'origin' => '*',
            'allowedMethods' => ['GET', 'POST', 'OPTIONS','DELETE','PUT'],
            'allowedHeaders' => ['Content-Type, Authorization, Accept, Origin, Access-Control-Allow-Origin'],
            'maxAge' => 2628000
        ]
    ]
];