<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function home()
    {
        $film_hot = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        $category = Category::with('movie')->orderBy('id', 'ASC')->where('status', 1)->get();
        $genre = Genre::where('status', 1)->orderBy('id', 'DESC')->get();
        $country = Country::where('status', 1)->orderBy('id', 'DESC')->get();
        return view("pages.home", compact("film_hot", "category", "genre", "country"));
        // return view("pages.home");
    }
    public function category($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $cate_slug = Category::where('slug', $slug)->first();
        $genre = Genre::orderBy('id', 'DESC')->where('status', 1)->get();
        $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
        $movie = Movie::where('category_id', $cate_slug->id)->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(4);
        return view("pages.category", compact("category", "genre", "country", "cate_slug", "movie"));
    }
    public function country($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $country_slug = Country::where('slug', $slug)->first();
        $genre = Genre::orderBy('id', 'DESC')->where('status', 1)->get();
        $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
        $movie = Movie::where('country_id', $country_slug->id)->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(4);
        return view("pages.country", compact("category", "genre", "country", "country_slug", "movie"));
    }
    public function episode()
    {
        return view("pages.episode");
    }
    public function genre($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre_slug = Genre::where('slug', $slug)->first();
        $genre = Genre::orderBy('id', 'DESC')->where('status', 1)->get();
        $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
        $movie = Movie::where('genre_id', $genre_slug->id)->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(4);
        return view("pages.genre", compact("category", "genre", "country", "genre_slug", "movie"));
    }
    public function year($year)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $year = $year;
        $genre = Genre::orderBy('id', 'DESC')->where('status', 1)->get();
        $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
        $movie = Movie::where('year', $year)->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(4);
        return view("pages.year", compact("category", "genre", "country", "year", "movie"));
    }
    public function movie($slug)
    {
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->where('status', 1)->get();
        $country = Country::orderBy('id', 'desc')->where('status', 1)->get();
        $movie = Movie::with('category', 'country', 'genre')->where('slug', $slug)->where('status', 1)->orderBy('updated_at', 'DESC')->first();
        $movie_related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        return view("pages.movie", compact("category", "genre", "country", "movie", "movie_related"));
    }
    public function watch()
    {
        return view("pages.watch");
    }
}
