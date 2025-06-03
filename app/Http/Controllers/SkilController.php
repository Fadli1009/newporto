<?php

namespace App\Http\Controllers;

use App\Models\Skil;
use Illuminate\Http\Request;

class SkilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skils = Skil::all();
        return view('admin.pages.skils.skils', compact('skils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.skils.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $link = $request->validate([
            'link.*' => 'required',
            'link' => 'required'
        ]);
        foreach ($request['link'] as $links) {
            Skil::create(['link' => $links]);
        }
        return redirect()->route('skils.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skil $skil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skil $skil)
    {
        return view('admin.pages.skils.edit', compact('skil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skil $skil)
    {
        $link = $request->validate([
            'link' => 'required'
        ]);
        $skil->update($link);        
        return redirect()->route('skils.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skil $skil)
    {
        $skil->delete();
        return redirect()->route('skils.index');
    }
}
