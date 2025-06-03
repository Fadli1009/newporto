<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserContontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = User::first();
        return view('admin.pages.profile', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $profile = $request->validate([
            'name' => 'nullable',
            'email' => 'nullable',
            'cv' => 'nullable',
            'password' => 'nullable',
            'photo_home' => 'nullable',
            'photo_aboutme1' => 'nullable',
            'photo_aboutme2' => 'nullable',
        ]);
        // dd($profile);
        $profile['password'] = bcrypt($profile['password']);
        if ($request->hasFile('cv')) {
            $profile['cv'] = $request->file('cv')->store('cv', 'public');
        }
        if ($request->hasFile('photo_home')) {
            $profile['photo_home'] = $request->file('photo_home')->store('photos', 'public');
        }
        if ($request->hasFile('photo_aboutme1')) {
            $profile['photo_aboutme1'] = $request->file('photo_aboutme1')->store('photos', 'public');
        }
        if ($request->hasFile('photo_aboutme2')) {
            $profile['photo_aboutme2'] = $request->file('photo_aboutme2')->store('photos', 'public');
        }
        Cache::forget("get_profile");
        Cache::forget('get_profile2');
        // dd($request->user()->id);
        $add = User::updateOrCreate(['id' => $request->user()->id], $profile);
        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
