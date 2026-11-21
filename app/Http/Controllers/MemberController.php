<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Activity;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        // Menggunakan Eloquent with('activity') untuk mengambil data relasi
        $dataMember = Member::with('activity')->get();
        return view('member.index', compact('dataMember'));
    }

    public function create()
    {
        $dataActivity = Activity::all(); // Ambil data kegiatan untuk pilihan dropdown
        return view('member.create', compact('dataActivity'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'phone' => 'required',
            'activity_id' => 'nullable|exists:activity,id',
        ]);

        Member::create($request->all());

        return redirect()->route('member.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit(Member $member)
    {
        $dataActivity = Activity::all();
        return view('member.edit', compact('member', 'dataActivity'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'phone' => 'required',
            'activity_id' => 'nullable|exists:activity,id',
        ]);

        $member->update($request->all());

        return redirect()->route('member.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('member.index')->with('success', 'Data anggota berhasil dihapus!');
    }
}