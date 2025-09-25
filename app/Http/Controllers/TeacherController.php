<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::with('kelas')->latest()->get();
        return view('teachers.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $kelas = Kelas::all();
        $selectedClass = $request->query('kelas_id');
        return view('teachers.create', compact('kelas', 'selectedClass'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'mapel' => 'required|string|max:50',
            'jenis_kelamin' => 'required|in:L,P',
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        Teacher::create($request->only(['nama', 'mapel', 'jenis_kelamin', 'kelas_id']));

        return redirect()->route('teachers.index')->with('success', $request->nama . ' added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $kelas = Kelas::all();
        return view('teachers.edit', compact('kelas', 'teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'string',
            'mapel' => 'string:max:50',
            'jenis_kelamin' => 'in:L,P',
            'kelas_id' => 'exists:kelas,id'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $teacher->update($request->only(['nama', 'mapel', 'jenis_kelamin', 'kelas_id']));

        return redirect()->route('teachers.index')->with('success', $request->nama . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', $teacher->nama . ' deleted successfully');
    }
}
