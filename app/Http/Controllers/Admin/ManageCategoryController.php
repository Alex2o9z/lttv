<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Support\Facades\Storage;

class ManageCategoryController extends Controller
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
        $category = CategoryTranslation::where('locale',$locale)->join('categories', 'category_translations.category_id', '=', 'categories.id')->orderBy('category_id','DESC')->paginate(10);
        $total = Category::count();
        session()->put([
            'category'=> $category,
            'total'=> $total,
        ]);
        return view('admin.pages.category.list_category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.category.add_category');
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
        //
        $data = $request->all();
        // dd($data);
        $category = new Category();

        $category->status = $data['status'];
        $category->created_at = now();
        $category->updated_at = now();

        // multi language
        $category->fill([
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
        // $category->image = 'not_yet';
        // return var_dump($image);

        // if($image) { return 'have image';}
        // return 'no image';

        if($image) {
            $get_name_image = $image->getClientOriginalName(); // get name of image
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$image->getClientOriginalExtension();

            $image->storeAs('public/uploads/category',$new_image);

            $category->image = $new_image;
        }

        // dd($category);
        $category->save();

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
        // $category = CategoryTranslation::where('category_id',$id)->join('categories', 'category_translations.category_id', '=', 'categories.id')->get();
        // session()->put('category',$category);

        $category_vi = CategoryTranslation::where('category_id',$id)->where('locale','vi')->first();
        $category_en = CategoryTranslation::where('category_id',$id)->where('locale','en')->first();
        $category = Category::where('id',$id)->first();

        session()->put([
            'category_vi' => $category_vi,
            'category_en' => $category_en,
            'category' => $category,
        ]);

        return view('admin.pages.category.edit_category');
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
            if($old_image != 'category.png') {
                Storage::delete($old_image);
            }

            //upload new image
            $get_name_image = $image->getClientOriginalName(); // get name of image
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$image->getClientOriginalExtension();

            $image->storeAs('public/uploads/category',$new_image);

            // $category->image = $new_image;
            Category::find($id)->update([
                'image' => $new_image,
            ]);
        }

        // dd($category);
        Category::find($id)->update([
            'status' => $data['status'],
            'updated_at' => now(),
        ]);
        CategoryTranslation::where('category_id',$id)->where('locale','vi')->update([
            'title' => $data['title:vi'],
            'desc' => $data['desc:vi'],
        ]);
        CategoryTranslation::where('category_id',$id)->where('locale','en')->update([
            'title' => $data['title:en'],
            'desc' => $data['desc:en'],
        ]);

        return redirect()->back()->with('message','update success');
    }

    public function updateStatus($id)
    {
        //
        $category = Category::find($id);
        if($category) {
            if($category->status == 0) $category->status = 1; else $category->status = 0;
            Category::find($id)->update([
                'status' => $category->status,
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
        Category::find($id)->delete();
        CategoryTranslation::where('category_id',$id)->delete();

        return redirect()->back()->with('message','deletesuccess');
    }
}
