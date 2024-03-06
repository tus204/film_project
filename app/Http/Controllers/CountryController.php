<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
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
        $list = Country::all();
        return view("adminCP.country.form", compact("list"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $country = new Country();
        $country->title = $data["title"];
        $country->slug = $data["slug"];
        $country->description = $data["desc"];
        $country->status = $data["status"];
        $country->save();
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
        $country = Country::find($id);
        $list = Country::all();
        return view("adminCP.country.form", compact('list','country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $country =Country::find($id);
        $country->title = $data["title"];
        $country->slug = $data["slug"];
        $country->description = $data["desc"];
        $country->status = $data["status"];
        $country->save();
        return redirect()->back()->with("success","");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Country::find($id)->delete();
        return redirect()->back()->with("success","");
    }
}
