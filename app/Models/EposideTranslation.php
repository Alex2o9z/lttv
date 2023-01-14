<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EposideTranslation extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [ 'ep_title', 'ep_desc'];
}
