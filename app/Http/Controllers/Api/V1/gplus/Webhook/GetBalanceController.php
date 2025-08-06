<?php

namespace App\Http\Controllers\Api\V1\gplus\Webhook;

use App\Enums\SeamlessWalletCode;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class GetBalanceController extends Controller
{
    public function getBalance(Request $request)
    {
        // Log the incoming request for debugging
        Log::info('GetBalance request received', [
            'operator_code' => $request->operator_code,
            'currency' => $request->currency,
            'request_time' => $request->request_time,
            'batch_requests_count' => count($request->batch_requests ?? []),
        ]);

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
            Log::error('GetBalance validation failed', ['error' => $e->getMessage()]);
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

        Log::info('GetBalance signature check', [
            'expected_sign' => $expectedSign,
            'received_sign' => $request->sign,
            'is_valid' => $isValidSign,
        ]);

        // Allowed currencies - support both regular (1:1) and special (1:1000) currencies
        // Added THB2 to handle the conversion mentioned in the chat
        $allowedCurrencies = ['THB', 'THB2', 'IDR', 'IDR2', 'KRW2', 'MMK2', 'VND2', 'LAK2', 'KHR2'];
        $isValidCurrency = in_array($request->currency, $allowedCurrencies);

        $results = [];
        // Updated special currencies to include THB2 for 1:1000 conversion
        $specialCurrencies = ['THB2', 'IDR2', 'KRW2', 'MMK2', 'VND2', 'LAK2', 'KHR2'];

        foreach ($request->batch_requests as $req) {
            Log::info('Processing batch request', [
                'member_account' => $req['member_account'],
                'product_code' => $req['product_code'],
            ]);

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
                    'code' => SeamlessWalletCode::InternalServerError->value,
                    'message' => 'Invalid Currency',
                ];
                continue; // Continue to next batch request
            }

            $user = User::with('wallet')->where('user_name', $req['member_account'])->first();
            if ($user && $user->wallet) {
                $balance = $user->wallet->balanceFloat;
                
                // Apply currency conversion based on the chat message: THB/1000 = THB2
                if (in_array($request->currency, $specialCurrencies)) {
                    $balance = $balance / 1000; // Apply 1:1000 conversion for special currencies
                    $balance = round($balance, 4);
                } else {
                    $balance = round($balance, 2); // Regular currencies (THB, IDR) use 1:1 ratio
                }

                Log::info('Balance calculated', [
                    'member_account' => $req['member_account'],
                    'original_balance' => $user->wallet->balanceFloat,
                    'converted_balance' => $balance,
                    'currency' => $request->currency,
                    'is_special_currency' => in_array($request->currency, $specialCurrencies),
                ]);

                $results[] = [
                    'member_account' => $req['member_account'],
                    'product_code' => $req['product_code'],
                    'balance' => (float) $balance,
                    'code' => SeamlessWalletCode::Success->value,
                    'message' => 'Success',
                ];
            } else {
                Log::warning('Member not found', [
                    'member_account' => $req['member_account'],
                    'user_exists' => $user ? 'yes' : 'no',
                    'wallet_exists' => $user && $user->wallet ? 'yes' : 'no',
                ]);

                $results[] = [
                    'member_account' => $req['member_account'],
                    'product_code' => $req['product_code'],
                    'balance' => (float) 0.00,
                    'code' => SeamlessWalletCode::MemberNotExist->value,
                    'message' => 'Member not found',
                ];
            }
        }

        Log::info('GetBalance response', [
            'results_count' => count($results),
            'results' => $results,
        ]);

        return ApiResponseService::success($results);
    }
}
