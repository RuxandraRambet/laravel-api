<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

       return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $data = $request->validated();

        $technology = new Technology();
        $technology->title = $data['title'];
        $technology->slug = Str::of($technology->title)->slug('-');
        $technology->save();

        return redirect()->route('admin.technologies.index')->with('message', "Technology $technology->title created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $data = $request->validated();
        
        $technology->update($data);

        return redirect()->route('admin.technologies.index')->with('message', "Technology  $technology->title updated correctly!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->projects()->detach();
        $technology->delete();

        return redirect()->route('admin.technologies.index')->with('message', "Technology  $technology->title deleted successfuly!");

    }
}
