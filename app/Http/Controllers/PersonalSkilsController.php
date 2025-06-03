<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategorySkils;
use App\Models\PersonalSkils;
use Illuminate\Support\Facades\Cache;

class PersonalSkilsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perSkil = PersonalSkils::all();
        $categorySkils = CategorySkils::all();
        return view('admin.pages.personalSkils.index', compact('perSkil', 'categorySkils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = CategorySkils::all();
        return view('admin.pages.personalSkils.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // upload foto        
        // dd($request->all());
        if ($request->hasFile('foto_skils')) {
            $path = $request->file('foto_skils')->store('foto_skils', 'public');
            Cache::forget('get_personalSkils');
            PersonalSkils::create([
                'nama_personalSkil' => $request->nama_personalSkil,
                'id_category' => $request->id_category,
                'foto_skils' => $path
            ]);
        }

        return redirect()->route('personalskils.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalSkils $personalSkils)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = CategorySkils::all();
        $personalSkils = PersonalSkils::find($id);
        return view('admin.pages.personalSkils.edit', compact('personalSkils', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $personalSkils = PersonalSkils::find($id);
        $data  = [
            'nama_personalSkil' => $request->nama_personalSkil,
            'id_category' => $request->id_category,
        ];
        if ($request->hasFile('foto_skils')) {
            $path = $request->file('foto_skils')->store('foto_skils', 'public');
            $data['foto_skils'] = $path;
        }
        Cache::forget('get_personalSkils');
        $personalSkils->update($data);
        return redirect()->route('personalskils.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $personalSkils = PersonalSkils::find($id);
        $personalSkils->delete();
        return redirect()->route('personalskils.index');
    }
}
