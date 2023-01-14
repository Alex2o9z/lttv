<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TranslatableContract
{
    use HasFactory;

    //translate
    use Translatable;
    
    public $translatedAttributes = [ 'title', 'desc'];
    protected $fillable = ['status','image'];

    //default custom
    // protected $table = 'categories';
    // protected $primaryKey = 'id';
    // protected $guarded = [];
}
