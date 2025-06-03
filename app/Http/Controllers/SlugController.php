<?php

namespace App\Http\Controllers;

use App\Models\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SlugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slug = Slug::first();
        // dd($slug);
        return view('admin.pages.slug', compact('slug'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slug = $request->validate([
            'slug_home' => 'nullable',
            'slug_about' => 'nullable',
            'slug_about_me' => 'nullable',
        ]);
        Cache::forget('get_slug');
        $data = Slug::updateOrCreate([], $slug);
        // return view('admin.pages.slug', compact('slug'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Slug $slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slug $slug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slug $slug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slug $slug)
    {
        //
    }
}
