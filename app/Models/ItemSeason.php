<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSeason extends Model
{
    use HasFactory;

    //translate
    use Translatable;
    
    public $translatedAttributes = [ 'ss_title', 'ss_info'];
    protected $fillable = ['status','ss_order'];
}
