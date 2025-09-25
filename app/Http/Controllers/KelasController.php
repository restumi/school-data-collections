<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::latest()->get();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required|string|unique:kelas,nama_kelas|max:50'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        Kelas::create($request->only('nama_kelas'));

        return redirect()->route('kelas.index')->with('success', 'Kelas added sucsessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required|string|unique:kelas,nama_kelas,' . $kelas->id,
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $kelas->update($request->only('nama_kelas'));

        return redirect()->route('kelas.index')->with('success', 'data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        try {
            if (!$kelas) {
                return redirect()->route('kelas.index')->with('error', 'Undefined class');
            }

            $studentsCount = $kelas->students()->count();

            if ($studentsCount > 0) {
                return redirect()->route('kelas.index')->with('error', 'Cannot delete class ' . $kelas->nama_kelas . ' because are still ' . $studentsCount . ' students there.');
            }

            $kelasName = $kelas->nama_kelas;
            $kelas->delete();

            return redirect()->route('kelas.index')->with('success', 'Class ' . $kelasName . ' deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('kelas.index')->with('error', 'Failed to delete class: ' . $e->getMessage());
        }
    }
}
