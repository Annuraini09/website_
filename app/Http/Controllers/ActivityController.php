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
        ]);

        Activity::create($request->all());

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
        ]);

        $activity->update($request->all());

        return redirect()->route('activity.index')->with('success', 'Data kegiatan berhasil diperbarui!');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('activity.index')->with('success', 'Data kegiatan berhasil dihapus!');
    }
}