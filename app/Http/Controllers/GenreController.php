<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Genre::all();
        return view("adminCP.genre.form", compact("list"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $genre = new Genre();
        $genre->title = $data["title"];
        $genre->description = $data["desc"];
        $genre->status = $data["status"];
        $genre->save();
        return redirect()->back()->with("success","");
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
        $genre = Genre::find($id);
        $list = Genre::all();
        return view("adminCP.genre.form", compact('list','genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $genre = Genre::find($id);
        $genre->title = $data["title"];
        $genre->description = $data["desc"];
        $genre->status = $data["status"];
        $genre->save();
        return redirect()->back()->with("success","");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Genre::find($id)->delete();
        return redirect()->back()->with("success","");
    }
}
