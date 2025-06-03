<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Monolog\Handler\WhatFailureGroupHandler;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::select('id', 'judul', 'img', 'status')->get();
        return view('admin.pages.project.project', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'judul' => 'required',
            'img' => 'required',
            'sub_judul' => 'required',
            'desc' => 'required',
            'status' => 'required'
        ]);
        if ($request->hasFile('img')) {
            $val['img'] = $request->file('img')->store('projectThumb', 'public');
        }
        $project = Project::create($val);
        foreach ($request->file('project_images') as $projImage) {
            $pathProj = $projImage->store('ProjectImages', 'public');
            ProjectImages::create([
                'project_images' => $pathProj,
                'id_project' => $project->id
            ]);
        }
        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $projectImgs = ProjectImages::where('id_project', $project->id)->get();
        // dd($ );
        return view('admin.pages.project.edit', compact('project', 'projectImgs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $projectImgs = ProjectImages::where('id_project', $project->id)->get();
        $val = $request->validate([
            'judul' => 'required',
            'img' => 'nullable',
            'sub_judul' => 'required',
            'desc' => 'required',
            'status' => 'required'
        ]);
        if ($request->hasFile('img')) {
            $val['img'] = $request->file('img')->store('projectThumb', 'public');
        }        
        $project->update($val);

        // hapus foto
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as  $imageId) {
                $image = ProjectImages::find($imageId);
                if ($image && $image->id_project == $project->id) {
                    Storage::disk('public')->delete(paths: $image->project_images);
                    $image->delete();
                }
            }
        }

        // taambah gambar
        if ($request->has('project_images')) {
            foreach ($request->project_images as  $projImg) {
                $path = $projImg->store('ProjectImages', 'public');
                ProjectImages::create([
                    'id_project' => $project->id,
                    'project_images' => $path
                ]);
            }
        }
        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
