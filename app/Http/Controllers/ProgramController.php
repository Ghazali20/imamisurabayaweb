<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        if (Program::count() == 0) {
            Program::insert([
                [
                    'title' => 'TUS Cup & Olahraga Rutin',
                    'description' => 'Wadah penyaluran hobi dan kesehatan fisik melalui pertandingan futsal rutin antar-mahasiswa perantau serta turnamen persahabatan tahunan.',
                    'category' => 'Rutin / Bulanan',
                    'icon' => '⚽',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Festival Budaya SURIANG',
                    'description' => 'Pagelaran seni dan budaya Minangkabau untuk memperkenalkan keindahan tradisi, kuliner khas, dan kesenian daerah kepada masyarakat luas di Surabaya.',
                    'category' => 'Agenda Tahunan',
                    'icon' => '🎭',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'BEM Goes to Desa / Bakti Sosial',
                    'description' => 'Program pengabdian kepada masyarakat sekitar Surabaya sebagai wujud nyata kepedulian sosial dan kontribusi aktif mahasiswa perantau.',
                    'category' => 'Periodik',
                    'icon' => '🤝',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        $programs = Program::latest()->get();
        return view('programs.index', compact('programs'));
    }

    public function adminIndex()
    {
        $programs = Program::latest()->get();
        return view('admin.programs.index', compact('programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:100',
            'icon' => 'nullable|string|max:50',
        ]);

        Program::create($request->all());

        return redirect()->back()->with('success', 'Program kerja berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:100',
            'icon' => 'nullable|string|max:50',
        ]);

        $program = Program::findOrFail($id);
        $program->update($request->all());

        return redirect()->back()->with('success', 'Program kerja berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->back()->with('success', 'Program kerja berhasil dihapus!');
    }
}