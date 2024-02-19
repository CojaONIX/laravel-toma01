<?php

namespace App\Console\Commands;

use App\Models\ExchangeRate;
use App\Services\ApiService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class getCurrencyCourse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'courses:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $create = ExchangeRate::getTodayCoursesForCreate();
        foreach($create as $currency)
        {
            $response = Http::withoutVerifying()
                ->get('https://kurs.resenje.org/api/v1/currencies/' . $currency . '/rates/today');

            ExchangeRate::create([
                'currency' => $currency,
                'exchange_middle' => $response['exchange_middle']
            ]);
        }

        $this->info("Created: " . json_encode($create));
    }
}
