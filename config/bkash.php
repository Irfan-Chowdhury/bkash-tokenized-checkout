<?php

return [
    "bkash_version" => "v1.2.0-beta",
    "bkash_sandbox" => env("BKASH_TOKENIZE_SANDBOX", ""),
    "bkash_base_url" => env("BKASH_TOKENIZE_BASE_URL", ""),
    "bkash_app_key" => env("BKASH_TOKENIZE_APP_KEY", ""),
    "bkash_app_secret" => env("BKASH_TOKENIZE_APP_SECRET", ""),
    "bkash_username" => env("BKASH_TOKENIZE_USER_NAME", ""),
    "bkash_password"  => env("BKASH_TOKENIZE_PASSWORD", ""),
    "bkash_callback_url"  => url('payment/bkash/callback'),
    // "bkash_callback_url"  => "http://127.0.0.1:8000/bkash/callback",
    'bkash_timezone' => 'Asia/Dhaka',
];
