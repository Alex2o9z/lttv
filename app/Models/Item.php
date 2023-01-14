<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model implements TranslatableContract
{
    use HasFactory;

    //translate
    use Translatable;
    
    public $translatedAttributes = [ 'title', 'slug', 'desc'];
    protected $fillable = ['poster', 'running_time', 'release_year', 'quality', 'status', 'type', 'premium'];

    //default custom
    // protected $table = 'genre';
    // protected $primaryKey = 'id';
    // protected $guarded = [];
}
