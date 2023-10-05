<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_name = 'Students';
        $students = Student::all();
        return view('admin.student.index', [
            'page_name' => $page_name,
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_name = 'Student';
        return view('admin.student.create', ['page_name' => $page_name]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'class' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'emergency_contact' => 'required|min:10|max:10',
            'status' => 'required',
        ]);
        try {

            $input = $request->all();
            Student::create($input);
            return redirect()->route('student.index')
                ->with('success', 'Student created successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $student = Student::find($id);
            $page_name = 'Student';

            return view('admin.student.show', [
                'page_name' => $page_name,
                'student' => $student
            ]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $student = Student::find($id);
            $page_name = 'Student';

            return view('admin.student.edit',  [
                'page_name' => $page_name,
                'student' => $student
            ]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Something went wrong!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'class' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'emergency_contact' => 'required|min:10|max:10',
            'status' => 'required',
        ]);
        try {
            $input = $request->all();
            $student = Student::find($id);

            if ($student) {
                $student->update($input);

                return redirect()->route('student.index')
                    ->with('success', 'Student updated successfully');
            } else {
                return redirect()->route('student.index')
                    ->with('error', 'Student not found');
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $student = Student::find($id);

            if ($student) {
                $student->delete();

                return redirect()->route('student.index')
                    ->with('success', 'Student deleted successfully');
            } else {
                return redirect()->route('student.index')
                    ->with('error', 'Student not found');
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Something went wrong!');
        }
    }
}
