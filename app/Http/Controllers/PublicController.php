<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Activity;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // Halaman Beranda (Home)
    public function home()
    {
        $activities = Activity::latest()->take(3)->get(); // Ambil 3 kegiatan terbaru
        return view('public.home', compact('activities'));
    }

    // Halaman Profil Eskul
    public function profile()
    {
        return view('public.profile');
    }

    // Halaman Informasi Anggota & Kegiatan
    public function info()
    {
        $members = Member::with('activity')->get();
        $activities = Activity::all();
        return view('public.info', compact('members', 'activities'));
    }
}