<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show all students
    public function index()
    {
        $students = Student::orderBy('lname')->get();
        return view('students.index', compact('students'));
    }

    // Show form to create a student
    public function create()
    {
        return view('students.create');
    }

    // Save new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'studentNumber' => 'required|string|size:9|unique:students,studentNumber',
            'lname' => 'required|string|max:150',
            'fname' => 'required|string|max:150',
            'mi' => 'nullable|string|max:2',
            'email' => 'nullable|email|max:150',
            'contactNumber' => 'nullable|string|max:20',
        ]);

        Student::create($validated);
        return redirect()->route('students.index')->with('status', 'Student created.');
    }

    // Show form to edit a student
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update existing student
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'studentNumber' => 'required|string|size:9|unique:students,studentNumber,' . $student->id,
            'lname' => 'required|string|max:150',
            'fname' => 'required|string|max:150',
            'mi' => 'nullable|string|max:2',
            'email' => 'nullable|email|max:150',
            'contactNumber' => 'nullable|string|max:20',
        ]);

        $student->update($validated);
        return redirect()->route('students.index')->with('status', 'Student updated.');
    }

    // Delete student
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('status', 'Student deleted.');
    }
}
