<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('kelas')->latest()->get();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $kelas = Kelas::all();
        $selectedClass = $request->query('kelas_id');
        return view('student.create', compact('kelas', 'selectedClass'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        Student::create($request->only(['nama', 'tanggal_lahir', 'jenis_kelamin', 'kelas_id']));

        return redirect()->route('students.index')->with('success', $request->nama . ' successfully added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $kelas = Kelas::all();
        return view('student.edit', compact('student', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'string',
            'tanggal_lahir' => 'date',
            'jenis_kelamin' => 'in:L,P',
            'kelas_id' => 'exists:kelas,id'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $student->update($request->only(['nama', 'tanggal_lahir', 'jenis_kelamin', 'kelas_id']));

        return redirect()->route('students.index')->with('success', $request->nama . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', $student->nama . ' deleted successfully');
    }
}
