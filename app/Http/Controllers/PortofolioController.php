<?php

namespace App\Http\Controllers;

use App\Models\CategorySkils;
use App\Models\Certificate;
use App\Models\PersonalSkils;
use App\Models\Project;
use App\Models\Slug;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class PortofolioController extends Controller
{
    public function home()
    {
        $profile = Cache::remember('get_profile', 60, function () {
            return User::select('name', 'photo_home', 'email', 'cv')->first();
        });
        // dd($profile);
        $slug = Cache::remember('get_slug_home', 60, function () {
            return Slug::select('slug_home')->first();
        });
        $project = Cache::remember('get_project_home', 60, function () {
            return Project::select('slug_project', 'judul', 'sub_judul', 'img')->take(3)->get();
        });
        return view('pages.home', compact('profile', 'slug', 'project'));
    }
    public function about()
    {
        $profile = Cache::remember('get_profile2', 60, function () {
            return User::select('name', 'photo_aboutme1', 'photo_aboutme2')->first();
        });
        $slug = Cache::remember('get_slug', 60, function () {
            return Slug::select('slug_home', 'slug_about', 'slug_about_me')->first();
        });
        return view('pages.about', compact('profile', 'slug'));
    }
    public function project()
    {
        $project =  Project::select('slug_project', 'judul', 'sub_judul', 'img')->paginate(5);
        // $project = Cache::remember('get_project_project', 60, function () {});
        return view('pages.project', compact('project'));
    }
    public function projectShow($slug)
    {
        $data = Project::select('id', 'img', 'judul', 'desc')->where('slug_project', $slug)->with('projectImages')->first();
        return view('pages.projectDetail', compact('data'));
    }
    public function sertifikat()
    {
        $certificate =  Certificate::select('slug_certificate', 'judul', 'sub_judul', 'img')->paginate(5);
        return view('pages.sertifikat', compact('certificate'));
    }
    public function certificateShow($slug)
    {
        $data = Certificate::select('id', 'img', 'judul', 'desc')->where('slug_certificate', $slug)->first();
        return view('pages.certificateDetail', compact('data'));
    }
    public function personalSkils()
    {
        $personalSkils = Cache::remember('get_personalSkils', 60, function () {
            return PersonalSkils::select('nama_personalSkil', 'id_category', 'foto_skils')->get();
        });
        $categoryPerskil = Cache::remember('get_catperskil', 60, function () {
            return CategorySkils::select('id', 'nama_kategori')->with('personalSkils')->get();
        });
        return view('pages.personalskil', compact('personalSkils', 'categoryPerskil'));
    }

    public function hireMe(Request $request)
    {
        $pesanEmail = "Pesan dari: {$request->email}\n"
            . "Pesan : {$request->pesan}";
        Mail::raw($pesanEmail, function ($message) use ($request) {
            $message->to('m.fadlikurniawan1009@gmail.com')
                ->subject($request->subject);
        });
        return response()->json(['status' => 'success']);
    }

    public function downloadCV($path)
    {
        // dd($path);  
        $path = storage_path('app/public/' . $path);
        if (!file_exists($path)) {
            abort(404);
        }
        $filename = "CV Muhammad Fadli Kurniawan.pdf";

        return response()->download($path, $filename);
    }
}
