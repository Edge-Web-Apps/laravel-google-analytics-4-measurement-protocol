<?php

namespace Freshbitsweb\LaravelGoogleAnalytics4MeasurementProtocol\Http\Controllers;

class StoreGoogleAnalyticsClientIdController
{
    public function __invoke(StoreRequest $request)
    {
        $validated = $request->validated();
        $sessionId = $validated['session_id'] ?? null;
        $sessionNumber = $validated['session_number'] ?? null;
        $clientId = $validated['client_id'] ?? null;

        Illuminate\Support\Facades\Log::info("GA4 Test: ".json_encode($validated));

        session([config('google-analytics-4-measurement-protocol.ga4_session_id') => $sessionId]);
        session([config('google-analytics-4-measurement-protocol.ga4_session_number') => $sessionNumber]);
        session([config('google-analytics-4-measurement-protocol.client_id_session_key') => $clientId]);
    }
}
