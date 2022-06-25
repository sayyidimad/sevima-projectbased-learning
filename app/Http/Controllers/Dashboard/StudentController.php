<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

use App\Models\Student;
use App\Models\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index', ['menu' => 'student', 'students' => Student::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create', ['menu' => 'student']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $request['password'] = bcrypt($request['password']);
        $request['role'] = User::STUDENT;
        $user = User::create($request->except('birth_date'));

        $request['join_date'] = now();
        $request['last_login'] = now();
        $request['user_id'] = $user->id;
        $student = Student::create($request->only(['name', 'birth_date', 'join_date', 'last_login', 'user_id']));

        return redirect()->route('student.index')->withSuccess('Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', ['menu' => 'student', 'student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $user = $student->user;
        if ($request['password'] != null) {
            $request['password'] = bcrypt($request['password']);
            $user->update($request->except('birth_date'));
        }
        $user->update($request->only(['name', 'email']));

        $student->update($request->only(['name', 'birth_date']));

        return redirect()->route('student.index')->withSuccess('Siswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $user = $student->user;
        $user->delete();

        $student->delete();

        return redirect()->route('student.index')->withSuccess('Siswa berhasil dihapus');
    }
}
