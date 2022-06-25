<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

use App\Models\Teacher;
use App\Models\User;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.index', ['teachers' => Teacher::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
        $request['password'] = bcrypt($request['password']);
        $request['role'] = User::TEACHER;
        $user = User::create($request->except('birth_date'));

        $request['join_date'] = now();
        $request['user_id'] = $user->id;
        $teacher = Teacher::create($request->only(['name', 'birth_date', 'join_date', 'user_id']));

        return redirect()->route('teacher.index')->withSuccess('Guru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit', ['teacher' => $teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeacherRequest  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $user = $teacher->user;
        if ($request['password'] != null) {
            $request['password'] = bcrypt($request['password']);
            $user->update($request->except('birth_date'));
        }
        $user->update($request->only(['name', 'email']));

        $teacher->update($request->only(['name', 'birth_date']));

        return redirect()->route('teacher.index')->withSuccess('Guru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $user = $teacher->user;
        $user->delete();

        $teacher->delete();

        return redirect()->route('teacher.index')->withSuccess('Guru berhasil dihapus');
    }
}
