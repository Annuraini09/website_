<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Member;

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
        $membersByGeneration = Member::query()
            ->orderBy('angkatan')
            ->orderBy('name')
            ->get()
            ->groupBy(fn (Member $member) => $member->angkatan ?: 'Angkatan belum ditentukan');
        $activities = Activity::query()->latest('date')->get();

        return view('public.info', compact('membersByGeneration', 'activities'));
    }
}
