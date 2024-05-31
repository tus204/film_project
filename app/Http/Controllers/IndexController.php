<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $film_hot = Movie::where('phim_hot', 1)->where('status', 1)->get();
        $category = Category::with('movie')->orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        return view("pages.home", compact("film_hot", "category", "genre", "country"));
        // return view("pages.home");
    }
    public function category($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $cate_slug = Category::where('slug', $slug)->first();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $genre = Genre::orderBy('id', 'desc')->get();
        $country = Country::orderBy('id', 'desc')->get();
        return view("pages.category", compact("category", "genre", "country", "cate_slug"));
    }
    public function country($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $country_slug = Country::where('slug', $slug)->first();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $genre = Genre::orderBy('id', 'desc')->get();
        $country = Country::orderBy('id', 'desc')->get();
        return view("pages.country", compact("category", "genre", "country", "country_slug"));
    }
    public function episode()
    {
        return view("pages.episode");
    }
    public function genre($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre_slug = Genre::where('slug', $slug)->first();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $genre = Genre::orderBy('id', 'desc')->get();
        $country = Country::orderBy('id', 'desc')->get();
        return view("pages.genre", compact("category", "genre", "country", "genre_slug"));
    }
    public function movie()
    {
        return view("pages.movie");
    }
    public function watch()
    {
        return view("pages.watch");
    }
}
