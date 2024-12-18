<?php

return [

    /*
     * Path to the json file containing the credentials.
     */
    'service_account_credentials_json' => storage_path('app/google-calendar/service-account-credentials.json'),

    'oauth' => [
        /*
            * Path to the json file containing the oauth2 credentials.
            */
        'credentials_json' => storage_path('app/google-calendar/oauth-credentials.json'),
    ],

    /*
     *  The id of the Google Calendar that will be used by default.
     */
    'calendar_id' => env('GOOGLE_CALENDAR_ID'),
];
