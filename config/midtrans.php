<?php

return [
    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'is_production' => false, // Ubah ke true jika menggunakan mode produksi
    'is_sanitized' => true,
    'is_3ds' => true,
];

