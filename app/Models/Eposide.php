<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eposide extends Model implements TranslatableContract
{
    use HasFactory;

    //translate
    use Translatable;
    
    public $translatedAttributes = [ 'ep_title', 'ep_desc'];
    protected $fillable = ['status','ep_order'];
}
