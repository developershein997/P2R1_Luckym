<?php

/**
 * Test script for GetBalance API
 * This script helps debug the GetBalance endpoint with sample data
 */

require_once 'vendor/autoload.php';

// Sample request data based on the JSON snippet provided
$requestData = [
    'batch_requests' => [
        [
            'member_account' => 'PLAYER0101',
            'product_code' => '1006'
        ],
        [
            'member_account' => 'PLAYER0102', 
            'product_code' => '1006'
        ]
    ],
    'operator_code' => 'P2R1',
    'currency' => 'THB',
    'request_time' => 1753931623,
    'sign' => 'd401d44b63b0982fabf12ab8318aecf5'
];

// Test signature generation
$secretKey = '3nDcj7T6nFPVFPRTWehfHP'; // From the test interface
$expectedSign = md5(
    $requestData['operator_code'] .
    $requestData['request_time'] .
    'getbalance' .
    $secretKey
);

echo "=== GetBalance API Test ===\n\n";

echo "Request Data:\n";
echo json_encode($requestData, JSON_PRETTY_PRINT) . "\n\n";

echo "Signature Test:\n";
echo "Expected Sign: " . $expectedSign . "\n";
echo "Received Sign: " . $requestData['sign'] . "\n";
echo "Signatures Match: " . (strtolower($expectedSign) === strtolower($requestData['sign']) ? 'YES' : 'NO') . "\n\n";

// Test currency conversion
$currencies = ['THB', 'THB2', 'IDR', 'IDR2'];
$specialCurrencies = ['THB2', 'IDR2', 'KRW2', 'MMK2', 'VND2', 'LAK2', 'KHR2'];

echo "Currency Conversion Test:\n";
foreach ($currencies as $currency) {
    $isSpecial = in_array($currency, $specialCurrencies);
    $conversion = $isSpecial ? '/1000' : '1:1';
    echo "- $currency: $conversion conversion\n";
}

echo "\nTHB2 Conversion Example:\n";
echo "1000 THB = 1 THB2 (THB/1000 = THB2)\n";
echo "5000 THB = 5 THB2\n";
echo "10000 THB = 10 THB2\n\n";

echo "=== Test Complete ===\n"; 