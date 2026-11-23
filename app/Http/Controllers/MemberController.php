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
            'jabatan' => 'required',
            'angkatan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi file foto
            'activity_id' => 'nullable|exists:activity,id',
        ]);

        $input = $request->all();

        // Logika upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $input['foto'] = $filename;
        }

        Member::create($input);

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
            'jabatan' => 'required',
            'angkatan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi file foto
            'activity_id' => 'nullable|exists:activity,id',
        ]);

        $input = $request->all();

        // Logika update foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($member->foto && file_exists(public_path('images/' . $member->foto))) {
                unlink(public_path('images/' . $member->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $input['foto'] = $filename;
        }

        $member->update($input);

        return redirect()->route('member.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    public function destroy(Member $member)
    {
        // Hapus file foto fisik saat data anggota dihapus
        if ($member->foto && file_exists(public_path('images/' . $member->foto))) {
            unlink(public_path('images/' . $member->foto));
        }

        $member->delete();

        return redirect()->route('member.index')->with('success', 'Data anggota berhasil dihapus!');
    }
}