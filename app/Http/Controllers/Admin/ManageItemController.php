<?php

namespace App\Http\Controllers\Admin;

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

class ManageItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $categories = CategoryTranslation::where('locale',$locale)->join('categories', 'category_translations.category_id', '=', 'categories.id')->get();
        $item_categories = ItemCategory::get();
        $genres = GenreTranslation::where('locale',$locale)->join('genres', 'genre_translations.genre_id', '=', 'genres.id')->get();
        $item_genres = ItemGenre::get();
        $countries = Country::get();
        $item_countries = ItemCountry::get();

        $total = Item::count();
        $rate = ItemRating::get();
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
        return view('admin.pages.item.list_item');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $locale = session('locale');
        $countries = Country::get();
        $categories = CategoryTranslation::where('locale',$locale)->join('categories', 'category_translations.category_id', '=', 'categories.id')->where('status',1)->get();
        $genres = GenreTranslation::where('locale',$locale)->join('genres', 'genre_translations.genre_id', '=', 'genres.id')->where('status',1)->get();
        session()->put([
            'countries' => $countries,
            'genres' => $genres,
            'categories' => $categories,
        ]);
        return view('admin.pages.item.add_item');
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
        $data = $request->all();
        // dd($data);
        $item = new Item();
        $item->running_time = $data['running_time'];
        $item->release_year = $data['release_year'];
        $item->quality = $data['quality'];
        if($data['age']) { $item->age = $data['age']; }
        $item->status = $data['status'];
        $item->type = $data['type'];
        $item->premium = $data['premium'];
        $item->created_at = now();
        $item->updated_at = now();

        // multi language
        $title_vi = str_slug($data['title:vi'], '-');
        $title_en = str_slug($data['title:en'], '-');
        $item->fill([
            'vi' => [
                'title' => $data['title:vi'],
                'slug' => $title_vi,
                'desc' => $data['desc:vi'],
            ],
            'en' => [
                'title' => $data['title:en'],
                'slug' => $title_en,
                'desc' => $data['desc:en'],
            ],
        ]);

        $image = $request->file('poster');

        if($image) {
            $get_name_image = $image->getClientOriginalName(); // get name of image
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$image->getClientOriginalExtension();

            $image->storeAs('public/uploads/item',$new_image);

            $item->poster = $new_image;
        } else {
            $item->poster = 'poster.jpg';
        }

        // dd($item);
        $item->save();
        $id = $item->id;
        // dd($id);

        if($data['countries']) {
            ItemCountry::insert([
                'item_id' => $id,
                'country_id' => $data['countries'],
            ]);
        }
        if($data['categories']) {
            ItemCategory::insert([
                'item_id' => $id,
                'category_id' => $data['categories'],
            ]);
        }
        if($data['genres']) {
            ItemGenre::insert([
                'item_id' => $id,
                'genre_id' => $data['genres'],
            ]);
        }

        //multi files
        $gallery = $request->file('gallery');
        if($gallery) {
            $get_name_image = $gallery->getClientOriginalName(); // get name of image
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$gallery->getClientOriginalExtension();

            $gallery->storeAs('public/uploads/gallery',$new_image);

            ItemGallery::insert([
                'item_id' => $id,
                'image' => $new_image,
            ]);
        }

        ItemRating::insert([
            'item_id' => $id,
            'rate' => 7,
            'rate_count' => 1,
        ]);

        if($data['type'] == 0) {
            if($data['trailer']) {
                ItemVideo::insert([
                    'item_id' => $id,
                    'link' => $data['trailer'],
                    'size' => '0',
                    'type' => 'trailer',
                ]);
            }
            if($data['video560p']) {
                ItemVideo::insert([
                    'item_id' => $id,
                    'link' => $data['video560p'],
                    'size' => '560',
                    'type' => 'video560p',
                ]);
            }
            if($data['video720p']) {
                ItemVideo::insert([
                    'item_id' => $id,
                    'link' => $data['video720p'],
                    'size' => '720',
                    'type' => 'video720p',
                ]);
            }
            if($data['video1080p']) {
                ItemVideo::insert([
                    'item_id' => $id,
                    'link' => $data['video1080p'],
                    'size' => '1080',
                    'type' => 'video1080p',
                ]);
            }
            if($data['video1440p']) {
                ItemVideo::insert([
                    'item_id' => $id,
                    'link' => $data['video1440p'],
                    'size' => '1440',
                    'type' => 'video1440p',
                ]);
            }
        }

        return redirect()->back()->with('message','success');
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
