<?php

namespace App\Services;

use App\Models\ExchangeRate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ApiService
{
    public function getCurrencyCourse($currency)
    {
        $todaysCurrency = ExchangeRate::where('currency', $currency)
            ->whereDate('created_at', Carbon::now())
            ->first();

        if(!$todaysCurrency) {
            $url = $currency
                ? 'https://kurs.resenje.org/api/v1/currencies/' . $currency . '/rates/today'
                : 'https://kurs.resenje.org/api/v1/rates/today';

            $response = Http::withoutVerifying()->get($url);

            ExchangeRate::create([
                'currency' => $currency,
                'exchange_middle' => $response['exchange_middle']
            ]);

            return $response->json();
        }

        return $todaysCurrency;
    }
}
