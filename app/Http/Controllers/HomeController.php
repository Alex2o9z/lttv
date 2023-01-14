<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index()
    {
        $locale = session('locale');
        $items = ItemTranslation::where('locale',$locale)->join('items', 'item_translations.item_id', '=', 'items.id')->orderBy('item_id','DESC')->paginate(6);
        $categories = CategoryTranslation::where('locale',$locale)->join('categories', 'category_translations.category_id', '=', 'categories.id')->get();
        $item_categories = ItemCategory::get();
        $genres = GenreTranslation::where('locale',$locale)->join('genres', 'genre_translations.genre_id', '=', 'genres.id')->get();
        $item_genres = ItemGenre::get();
        $countries = Country::get();
        $item_countries = ItemCountry::get();

        $total = Item::count();
        $rate = ItemRating::get();

        $lasest_items = ItemTranslation::where('locale',$locale)->join('items', 'item_translations.item_id', '=', 'items.id')->orderBy('item_id','DESC')->take(6)->get();

        $one_eposide = ItemTranslation::where('locale',$locale)->where('type',0)->join('items', 'item_translations.item_id', '=', 'items.id')->orderBy('item_id','DESC')->take(12)->get();

        $many_eposide = ItemTranslation::where('locale',$locale)->where('type',1)->join('items', 'item_translations.item_id', '=', 'items.id')->orderBy('item_id','DESC')->take(12)->get();

        $premiums = ItemTranslation::where('locale',$locale)->where('premium',1)->join('items', 'item_translations.item_id', '=', 'items.id')->orderBy('item_id','DESC')->take(6)->get();

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
            'lasest_items' => $lasest_items,
        ]);
        return view('client.home');
    }

    public function adminHome()
    {
        return view('admin.home');
    }

    public function pricing()
    {
        return view('client.pages.premium.pricing');
    }
    public function payment()
    {
        $id = Auth::user()->id;
        User::where('id',)->update(['premium' => 1]);
        return view('client.pages.premium.premium');
    }
}
