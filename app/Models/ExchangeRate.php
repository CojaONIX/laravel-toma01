<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use mysql_xdevapi\Table;

class ExchangeRate extends Model
{
    protected $table = 'exchange_rates';
    protected $fillable = ['currency', 'exchange_middle'];

    const CURRENCY_EUR = 'eur';
    const CURRENCY_USD = 'usd';
    const CURRENCY_RUB = 'rub';
    const AVAILABLE_CURRENCIES = [
        self::CURRENCY_EUR, self::CURRENCY_USD, self::CURRENCY_RUB
    ];

    public static function getTodayCoursesForCreate()
    {
        $currencies = self::whereDate('created_at', Carbon::now())->get()->pluck('currency')->toArray();
        return array_diff(self::AVAILABLE_CURRENCIES, $currencies);
    }

    public static function getTodayCourses()
    {
        return self::whereDate('created_at', Carbon::now())->get();
    }
}
