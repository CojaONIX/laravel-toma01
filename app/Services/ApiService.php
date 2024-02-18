<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
    public function getCurrencyCourse($currency)
    {
        $url = $currency
            ? 'https://kurs.resenje.org/api/v1/currencies/'.$currency.'/rates/today'
            : 'https://kurs.resenje.org/api/v1/rates/today';

        $response = Http::withoutVerifying()->get($url);

        return $response->json();
    }
}
