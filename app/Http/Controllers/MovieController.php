<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $movie;

    public function __construct(Movie $movie)
    {
        $movie = $this->movie;
    }
    public function index()
    {
        // detail
        $list = Movie::with('category', 'country', 'genre')->orderBy("id", "desc")->get();
        return view("adminCP.movie.index", compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::where('status', 1)->pluck("title", "id");
        $country = Country::where('status', 1)->pluck("title", "id");
        $genre = Genre::where('status', 1)->pluck("title", "id");
        return view("adminCP.movie.form", compact("category", "country", "genre"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        $movie = new Movie;
        $movie->title = $data["title"];
        $movie->name_eng = $data["name_eng"];
        $movie->phim_hot = $data["phim_hot"];
        $movie->slug = $data["slug"];
        $movie->status = $data["status"];
        $movie->description = $data["description"];
        $movie->category_id = $data["category_id"];
        $movie->country_id = $data["country_id"];
        $movie->genre_id = $data["genre_id"];
        //upload image
        $get_image = $request->file('image');
        // $path = public_path('uploads/movies');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); // image.jpg bla bla
            $name_image = current(explode('.', $get_name_image)); // [0] => image . [1] => jpg
            $new_image = date("Y-m-d_H-i-s", time()) . '_' . $name_image . '.' . $get_image->getClientOriginalExtension(); // => image_time().jpg
            $get_image->move('uploads/movies', $new_image);
            $movie->image = $new_image;
        }

        $movie->save();

        // rediẻct
        return redirect()->back()->with("status", "Thêm phim thành công");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::where('status', 1)->pluck("title", "id");
        $country = Country::where('status', 1)->pluck("title", "id");
        $genre = Genre::where('status', 1)->pluck("title", "id");
        $movie = Movie::find($id);
        return view("adminCP.movie.form", compact("category", "country", "genre", "movie"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();

        $movie = Movie::find($id);
        $movie->title = $data["title"];
        $movie->name_eng = $data["name_eng"];
        $movie->phim_hot = $data["phim_hot"];
        $movie->slug = $data["slug"];
        $movie->status = $data["status"];
        $movie->description = $data["description"];
        $movie->category_id = $data["category_id"];
        $movie->country_id = $data["country_id"];
        $movie->genre_id = $data["genre_id"];
        //upload image
        $get_image = $request->file('image');
        // $path = public_path('uploads/movies');
        if ($get_image) {
            if (!empty ($movie->image)) {
                unlink('uploads/movies/' . $movie->image);
            }
            $get_name_image = $get_image->getClientOriginalName(); // image.jpg bla bla
            $name_image = current(explode('.', $get_name_image)); // [0] => image . [1] => jpg
            $new_image = date("Y-m-d_H-i-s", time()) . '_' . $name_image . '.' . $get_image->getClientOriginalExtension(); // => image_time().jpg
            $get_image->move('uploads/movies', $new_image);
            $movie->image = $new_image;
        }

        $movie->save();

        // rediẻct
        return redirect()->back()->with("status", "Cập nhật phim thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $movie = Movie::find($id);
        if ($movie) {
            if (!empty ($movie->image)) {
                if (file_exists('uploads/movies/' . $movie->image)) {
                    unlink('uploads/movies/' . $movie->image);
                }
            }
            $movie->delete();
            return redirect()->back()->with("status", "Successfully");
        } else {
            return redirect()->back()->with("status", "failed");
        }
        
        
    }
}
