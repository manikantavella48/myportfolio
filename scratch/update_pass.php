<?php
$hash = password_hash('Neha@2021', PASSWORD_DEFAULT);
$creds = [
    'username' => 'admin',
    'password_hash' => $hash
];
file_put_contents(__DIR__ . '/../data/admin_creds.json', json_encode($creds, JSON_PRETTY_PRINT));
echo "Password updated successfully to Neha@2021!\nHash: " . $hash . "\n";
