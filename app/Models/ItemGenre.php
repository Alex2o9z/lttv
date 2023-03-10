<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemGenre extends Model
{
    use HasFactory;

    protected $table = 'item_genre';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
