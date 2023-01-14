<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemGallery extends Model
{
    use HasFactory;

    protected $table = 'item_gallery';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
