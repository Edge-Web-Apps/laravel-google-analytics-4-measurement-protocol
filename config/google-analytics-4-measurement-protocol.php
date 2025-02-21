<?php

return [
    'measurement_id' => env('MEASUREMENT_ID', null), # Same as Google Analytics Tracking ID

    'api_secret' => env('MEASUREMENT_PROTOCOL_API_SECRET', null),

    'ga4_session_id' => 'google-analytics-4-measurement-protocol.session_id',

    'ga4_session_number' => 'google-analytics-4-measurement-protocol.session_number',

    'client_id_session_key' => 'google-analytics-4-measurement-protocol.client_id'
];
