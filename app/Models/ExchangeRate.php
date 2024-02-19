<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class ExchangeRate extends Model
{
    protected $table = 'exchange_rates';
    protected $fillable = ['currency', 'exchange_middle'];
}
