<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain'    => env('MAILGUN_DOMAIN'),
        'secret'    => env('MAILGUN_SECRET'),
        'endpoint'  => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key'       => env('AWS_ACCESS_KEY_ID'),
        'secret'    => env('AWS_SECRET_ACCESS_KEY'),
        'region'    => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'stripe' => [
        'model'     => App\Models\User::class,
        'key'       => env('STRIPE_KEY'),
        'secret'    => env('STRIPE_SECRET'),
        'gateway'   => 'Stripe',
        'currency'  => 'AUD',
    ],

    'paypal' => [
        'username'      => env('PAYPAL_USERNAME'),
        'password'      => env('PAYPAL_PASSWORD'),
        'signature'     => env('PAYPAL_SIGNATURE'),
        'cancel_url'    => env('APP_URL') . '/checkout/payment',
        'return_url'    => env('APP_URL') . '/checkout/confirm',
        'merchant_id'   => env('PAYPAL_MERCHANT_ID'),
        'environment'   => env('PAYPAL_ENVIRONMENT'),
        'gateway'       => 'PayPal_Express',
        'currency'      => 'AUD',
    ],

];
