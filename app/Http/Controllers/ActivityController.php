<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $dataActivity = Activity::all();
        return view('activity.index', compact('dataActivity'));
    }

    public function create()
    {
        return view('activity.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'date' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto kegiatan
        ]);

        $input = $request->all();

        // Logika upload foto kegiatan
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $input['foto'] = $filename;
        }

        Activity::create($input);

        return redirect()->route('activity.index')->with('success', 'Kegiatan Deutsch Club berhasil ditambahkan!');
    }

    public function edit(Activity $activity)
    {
        return view('activity.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'date' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto kegiatan
        ]);

        $input = $request->all();

        // Logika update foto kegiatan
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($activity->foto && file_exists(public_path('images/' . $activity->foto))) {
                unlink(public_path('images/' . $activity->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $input['foto'] = $filename;
        }

        $activity->update($input);

        return redirect()->route('activity.index')->with('success', 'Data kegiatan berhasil diperbarui!');
    }

    public function destroy(Activity $activity)
    {
        // Hapus file foto fisik saat data kegiatan dihapus
        if ($activity->foto && file_exists(public_path('images/' . $activity->foto))) {
            unlink(public_path('images/' . $activity->foto));
        }

        $activity->delete();

        return redirect()->route('activity.index')->with('success', 'Data kegiatan berhasil dihapus!');
    }
}