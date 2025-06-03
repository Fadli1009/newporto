<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategorySkils;
use Illuminate\Support\Facades\Cache;

class CategorySkilsController extends Controller
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
        return view('admin.pages.categorySkils.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cache::forget('get_catperskil');
        CategorySkils::create([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect()->route('personalskils.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategorySkils $categorySkils)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorySkils = CategorySkils::find($id);
        return view('admin.pages.categorySkils.edit', compact('categorySkils'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categorySkils = CategorySkils::find($id);
        Cache::forget('get_catperskil');
        $categorySkils->update([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect()->route('personalskils.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorySkils = CategorySkils::find($id);
        $categorySkils->delete();
        return redirect()->route('personalskils.index');
    }
}
