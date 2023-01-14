<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCountry extends Model
{
    use HasFactory;

    protected $table = 'item_country';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
