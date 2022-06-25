<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

use App\Models\Course;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $view = request('view');

        return view(('event.create'), ['menu' => 'course', 'course' => $course]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request, Course $course)
    {
        $request['course_id'] = $course->id;
        $event = Event::create($request->input());

        return redirect()->route('course.show', $course)->withSuccess('Aktivitas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Event $event)
    {
        return view('dashboard.event.edit', ['menu' => 'course', 'course' => $course, 'event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Course $course, Event $event)
    {
        $event->update($request->input());

        return redirect()->route('course.show', $course)->withSuccess('Aktivitas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Event $event)
    {
        $event->delete();

        return redirect()->route('course.show', $course)->withSuccess('Aktivitas berhasil dihapus');
    }
}
