<script>
function collectClientId() {
    if (typeof ga !== 'undefined') {
        ga(function(tracker) {
            var clientId = tracker.get('clientId');
            postClientId(clientId);
        });
    } else {
        gtag('get', "{{ config('google-analytics-4-measurement-protocol.measurement_id') }}", 'session_id', function (sessionId) {
            gtag('get', "{{ config('google-analytics-4-measurement-protocol.measurement_id') }}", 'session_number', function (sessionNumber) {
                gtag('get', "{{ config('google-analytics-4-measurement-protocol.measurement_id') }}", 'client_id', function (clientId) {
                    postClientId(clientId,sessionId,sessionNumber);
                });
            });
        });
    }
}

function postClientId(clientId,sessionId,sessionNumber) {
    var data = new FormData();
    data.append('client_id', clientId);
    data.append('session_id', sessionId);
    data.append('session_number', sessionNumber);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '{{ url('/store-google-analytics-client-id') }}', true);
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
    xhr.send(data);
}

@if (!session(config('google-analytics-4-measurement-protocol.client_id_session_key'), false))
collectClientId();
@endif
</script>

