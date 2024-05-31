<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
// use App\Models\ProductImages;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // detail
        $list = Country::all();
        return view("adminCP.country.index", compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $list = Country::all();
        return view("adminCP.country.form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $country = new Country();
        $data = $request->all();
        // $country = Country::create($request->all());
        $country->title = $data["title"];
        $country->slug = $data["slug"];
        $country->description = $data["desc"];
        $country->status = $data["status"];
        $country->save();
        return redirect()->back()->with("status","Thêm phim thành công");

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
        return redirect()->back()->with("status","Sửa phim thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Country::find($id)->delete();
        return redirect()->back()->with("status","Xóa phim thành công");
    }
}
