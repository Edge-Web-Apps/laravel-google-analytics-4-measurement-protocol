<?php

namespace Freshbitsweb\LaravelGoogleAnalytics4MeasurementProtocol\Http\Controllers;

class StoreGoogleAnalyticsClientIdController
{
    public function __invoke(): void
    {
        session([config('google-analytics-4-measurement-protocol.ga4_session_id') => request('session_id')]);
        session([config('google-analytics-4-measurement-protocol.ga4_session_number') => request('session_number')]);
        session([config('google-analytics-4-measurement-protocol.client_id_session_key') => request('client_id')]);
    }
}
