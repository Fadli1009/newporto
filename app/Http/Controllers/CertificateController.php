<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificate = Certificate::all();
        return view('admin.pages.certificate.certificate', compact('certificate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.certificate.create');
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
        // dd($val);
        if ($request->hasFile('img')) {
            $val['img'] = $request->file('img')->store('certificate', 'public');
        }
        Certificate::create($val);
        return redirect()->route('certificate.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        return view('admin.pages.certificate.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $val = $request->validate([
            'judul' => 'required',
            'img' => 'nullable',
            'sub_judul' => 'required',
            'desc' => 'required',
            'status' => 'required'
        ]);
        if ($request->hasFile('img')) {
            $val['img'] = $request->file('img')->store('certificate', 'public');
        }
        $certificate->update($val);
        return redirect()->route('certificate.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('certificate.index');
    }
}
