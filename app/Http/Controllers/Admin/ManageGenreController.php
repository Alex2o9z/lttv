<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\GenreTranslation;
use Illuminate\Support\Facades\Storage;

class ManageGenreController extends Controller
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
        $genre = GenreTranslation::where('locale',$locale)->join('genres', 'genre_translations.genre_id', '=', 'genres.id')->orderBy('genre_id','DESC')->paginate(10);
        $total = Genre::count();
        session()->put([
            'genre'=> $genre,
            'total'=> $total,
        ]);
        return view('admin.pages.genre.list_genre');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.genre.add_genre');
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
        $genre = new Genre();

        $genre->status = $data['status'];
        $genre->created_at = now();
        $genre->updated_at = now();

        // multi language
        $genre->fill([
            'vi' => [
                'title' => $data['title:vi'],
                'desc' => $data['desc:vi'],
            ],
            'en' => [
                'title' => $data['title:en'],
                'desc' => $data['desc:en'],
            ],
        ]);

        $image = $request->file('image');
        // $genre->image = 'not_yet';
        // return var_dump($image);

        // if($image) { return 'have image';}
        // return 'no image';

        if($image) {
            $get_name_image = $image->getClientOriginalName(); // get name of image
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$image->getClientOriginalExtension();

            $image->storeAs('public/uploads/genre',$new_image);

            $genre->image = $new_image;
        }

        // dd($genre);
        $genre->save();

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
        // $genre = GenreTranslation::where('genre_id',$id)->join('genres', 'genre_translations.genre_id', '=', 'genres.id')->get();
        // session()->put('genre',$genre);

        $genre_vi = GenreTranslation::where('genre_id',$id)->where('locale','vi')->first();
        $genre_en = GenreTranslation::where('genre_id',$id)->where('locale','en')->first();
        $genre = Genre::where('id',$id)->first();

        session()->put([
            'genre_vi' => $genre_vi,
            'genre_en' => $genre_en,
            'genre' => $genre,
        ]);

        return view('admin.pages.genre.edit_genre');
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
        $data = $request->all();
        // dd($data);

        $image = $request->file('image');

        if($image) {
            //delete old image
            $old_image = $request->old_image;
            if($old_image != 'genre.png') {
                Storage::delete($old_image);
            }

            //upload new image
            $get_name_image = $image->getClientOriginalName(); // get name of image
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$image->getClientOriginalExtension();

            $image->storeAs('public/uploads/genre',$new_image);

            // $genre->image = $new_image;
            Genre::find($id)->update([
                'image' => $new_image,
            ]);
        }

        // dd($genre);
        Genre::find($id)->update([
            'status' => $data['status'],
            'updated_at' => now(),
        ]);
        GenreTranslation::where('genre_id',$id)->where('locale','vi')->update([
            'title' => $data['title:vi'],
            'desc' => $data['desc:vi'],
        ]);
        GenreTranslation::where('genre_id',$id)->where('locale','en')->update([
            'title' => $data['title:en'],
            'desc' => $data['desc:en'],
        ]);

        return redirect()->back()->with('message','update success');
    }

    public function updateStatus($id)
    {
        //
        $genre = Genre::find($id);
        if($genre) {
            if($genre->status == 0) $genre->status = 1; else $genre->status = 0;
            Genre::find($id)->update([
                'status' => $genre->status,
                'updated_at' => now(),
            ]);
        }
        return redirect()->back()->with('message','update status success');
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
        Genre::find($id)->delete();
        GenreTranslation::where('genre_id',$id)->delete();

        return redirect()->back()->with('message','deletesuccess');
    }
}
