<?php

namespace App\Console\Commands;

use App\Services\ApiService;
use Illuminate\Console\Command;

class getCurrencyCourse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'course:get {currency?}';

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
        $apiService = new ApiService();
        $response = $apiService->getCurrencyCourse($this->argument('currency'));
        dd($response);
    }
}
