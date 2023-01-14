<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Genre;
use App\Models\GenreTranslation;
use App\Models\Item;
use App\Models\ItemTranslation;
use App\Models\ItemCategory;
use App\Models\ItemCountry;
use App\Models\ItemGallery;
use App\Models\ItemGenre;
use App\Models\ItemRating;
use App\Models\ItemVideo;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $locale = session('locale');
        $items = ItemTranslation::where('locale',$locale)->join('items', 'item_translations.item_id', '=', 'items.id')->orderBy('item_id','DESC')->paginate(10);
        $categories = CategoryTranslation::where('locale',$locale)->join('categories', 'category_translations.category_id', '=', 'categories.id')->all();
        $item_categories = ItemCategory::all();
        $genres = GenreTranslation::where('locale',$locale)->join('genres', 'genre_translations.genre_id', '=', 'genres.id')->all();
        $item_genres = ItemGenre::all();
        $countries = Country::all();
        $item_countries = ItemCountry::all();

        $total = Item::count();
        $rate = ItemRating::all();
        session()->put([
            'items'=> $items,
            'categories' => $categories,
            'item_categories' => $item_categories,
            'genres' => $genres,
            'item_genres' => $item_genres,
            'countries' => $countries,
            'item_countries' => $item_countries,
            'total'=> $total,
            'rate' => $rate,
        ]);
        return view('client.pages.list_item');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $locale = session('locale');
        $item = ItemTranslation::where('locale',$locale)->where('item_id',$id)->join('items', 'item_translations.item_id', '=', 'items.id')->first();
        $categories = CategoryTranslation::where('locale',$locale)->join('categories', 'category_translations.category_id', '=', 'categories.id')->get();
        $item_categories = ItemCategory::get();
        $genres = GenreTranslation::where('locale',$locale)->join('genres', 'genre_translations.genre_id', '=', 'genres.id')->get();
        $item_genres = ItemGenre::get();
        $countries = Country::get();
        $item_countries = ItemCountry::get();
        $rate = ItemRating::where('item_id',$item->id)->first();

        session()->put([
            'item'=> $item,
            'categories' => $categories,
            'item_categories' => $item_categories,
            'genres' => $genres,
            'item_genres' => $item_genres,
            'countries' => $countries,
            'item_countries' => $item_countries,
            'rate' => $rate,
        ]);

        Item::where('id',$item->id)->increment('view', 1);

        //video
        if($item->type == 0) {
            $trailer = ItemVideo::where('item_id',$item->id)->where('type','trailer')->first();
            $video560p = ItemVideo::where('item_id',$item->id)->where('type','video560p')->first();
            $video720p = ItemVideo::where('item_id',$item->id)->where('type','video720p')->first();
            $video1080p = ItemVideo::where('item_id',$item->id)->where('type','video1080p')->first();
            $video1440p = ItemVideo::where('item_id',$item->id)->where('type','video1440p')->first();
            session()->put([
                'trailer' => $trailer,
                'video560p' => $video560p,
                'video720p' => $video720p,
                'video1080p' => $video1080p,
                'video1440p' => $video1440p,
            ]);

            return view('client.pages.item.item_one');
        }

        if($item->type == 1) {
            return view('client.pages.item.item_many');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
