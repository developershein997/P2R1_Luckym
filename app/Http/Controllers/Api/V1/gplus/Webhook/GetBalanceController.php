<?php

namespace App\Http\Controllers\Api\V1\gplus\Webhook;

use App\Enums\SeamlessWalletCode;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class GetBalanceController extends Controller
{
    public function getBalance(Request $request)
    {
        // Validate request
        try {
            $request->validate([
                'batch_requests' => 'required|array',
                'operator_code' => 'required|string',
                'currency' => 'required|string',
                'sign' => 'required|string',
                'request_time' => 'required|integer',
            ]);
        } catch (\Exception $e) {
            // In a real Laravel app, this would be handled by Laravel's exception handler
            // For this mock, we'll return a generic error or log it.
            return ApiResponseService::error($e->getMessage(), SeamlessWalletCode::InternalServerError->value);
        }


        // Signature check
        $secretKey = Config::get('seamless_key.secret_key');
        $expectedSign = md5(
            $request->operator_code.
            $request->request_time.
            'getbalance'.
            $secretKey
        );
        $isValidSign = strtolower($request->sign) === strtolower($expectedSign);

        // Allowed currencies - support both regular (1:1) and special (1:1000) currencies
        $allowedCurrencies = ['THB', 'IDR', 'IDR2', 'KRW2', 'MMK2', 'VND2', 'LAK2', 'KHR2'];
        $isValidCurrency = in_array($request->currency, $allowedCurrencies);

        $results = [];
        $specialCurrencies = ['IDR2', 'KRW2', 'MMK2', 'VND2', 'LAK2', 'KHR2'];

        foreach ($request->batch_requests as $req) {
            if (! $isValidSign) {
                $results[] = [
                    'member_account' => $req['member_account'],
                    'product_code' => $req['product_code'],
                    'balance' => (float) 0.00,
                    'code' => SeamlessWalletCode::InvalidSignature->value,
                    'message' => 'Incorrect Signature',
                ];
                continue; // Continue to next batch request
            }

            if (! $isValidCurrency) {
                $results[] = [
                    'member_account' => $req['member_account'],
                    'product_code' => $req['product_code'],
                    'balance' => (float) 0.00,
                    'code' => SeamlessWalletCode::InternalServerError->value, // Or a more specific "InvalidCurrency" enum if available
                    'message' => 'Invalid Currency',
                ];
                continue; // Continue to next batch request
            }

            $user = User::with('wallet')->where('user_name', $req['member_account'])->first();
            if ($user && $user->wallet) {
                $balance = $user->wallet->balanceFloat;
                if (in_array($request->currency, $specialCurrencies)) {
                    $balance = $balance / 1000; // Apply 1:1000 conversion for special currencies
                    $balance = round($balance, 4);
                } else {
                    $balance = round($balance, 2); // Regular currencies (THB, IDR) use 1:1 ratio
                }
                $results[] = [
                    'member_account' => $req['member_account'],
                    'product_code' => $req['product_code'],
                    'balance' => (float) $balance,
                    'code' => SeamlessWalletCode::Success->value,
                    'message' => 'Success',
                ];
            } else {
                $results[] = [
                    'member_account' => $req['member_account'],
                    'product_code' => $req['product_code'],
                    'balance' => (float) 0.00,
                    'code' => SeamlessWalletCode::MemberNotExist->value,
                    'message' => 'Member not found',
                ];
            }
        }

        return ApiResponseService::success($results);
    }
    // public function getBalance(Request $request)
    // {
    //     // Validate request
    //     $request->validate([
    //         'batch_requests' => 'required|array',
    //         'operator_code' => 'required|string',
    //         'currency' => 'required|string',
    //         'sign' => 'required|string',
    //         'request_time' => 'required|integer',
    //     ]);

    //     // Signature check
    //     $secretKey = Config::get('seamless_key.secret_key');
    //     $expectedSign = md5(
    //         $request->operator_code.
    //         $request->request_time.
    //         'getbalance'.
    //         $secretKey
    //     );
    //     $isValidSign = strtolower($request->sign) === strtolower($expectedSign);

    //     // Allowed currencies - support both regular (1:1) and special (1:1000) currencies
    //     $allowedCurrencies = ['THB', 'IDR', 'IDR2', 'KRW2', 'MMK2', 'VND2', 'LAK2', 'KHR2'];
    //     $isValidCurrency = in_array($request->currency, $allowedCurrencies);

    //     $results = [];
    //     $specialCurrencies = ['IDR2', 'KRW2', 'MMK2', 'VND2', 'LAK2', 'KHR2'];
    //     foreach ($request->batch_requests as $req) {
    //         if (! $isValidSign) {
    //             $results[] = [
    //                 'member_account' => $req['member_account'],
    //                 'product_code' => $req['product_code'],
    //                 'balance' => (float) 0.00,
    //                 'code' => \App\Enums\SeamlessWalletCode::InvalidSignature->value,
    //                 'message' => 'Incorrect Signature',
    //             ];

    //             continue;
    //         }

    //         if (! $isValidCurrency) {
    //             $results[] = [
    //                 'member_account' => $req['member_account'],
    //                 'product_code' => $req['product_code'],
    //                 'balance' => (float) 0.00,
    //                 'code' => \App\Enums\SeamlessWalletCode::InternalServerError->value,
    //                 'message' => 'Invalid Currency',
    //             ];

    //             continue;
    //         }

    //         $user = User::with('wallet')->where('user_name', $req['member_account'])->first();
    //         if ($user && $user->wallet) {
    //             $balance = $user->wallet->balanceFloat;
    //             if (in_array($request->currency, $specialCurrencies)) {
    //                 $balance = $balance / 1000; // Apply 1:1000 conversion for special currencies
    //                 $balance = round($balance, 4);
    //             } else {
    //                 $balance = round($balance, 2); // Regular currencies (THB, IDR) use 1:1 ratio
    //             }
    //             $results[] = [
    //                 'member_account' => $req['member_account'],
    //                 'product_code' => $req['product_code'],
    //                 'balance' => (float) $balance,
    //                 'code' => \App\Enums\SeamlessWalletCode::Success->value,
    //                 'message' => 'Success',
    //             ];
    //         } else {
    //             $results[] = [
    //                 'member_account' => $req['member_account'],
    //                 'product_code' => $req['product_code'],
    //                 'balance' => (float) 0.00,
    //                 'code' => \App\Enums\SeamlessWalletCode::MemberNotExist->value,
    //                 'message' => 'Member not found',
    //             ];
    //         }
    //     }

    //     return ApiResponseService::success($results);
    // }
}
