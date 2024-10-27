<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Type_Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::query()->latest()->get();
        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type_Room::query()->get();
        return view('rooms.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'room_number' => 'required|string',
            'status' => 'required|string',
            'floor' => 'required|integer',
            'image' => 'required|image',
            'type_room_id' => 'required|integer'
        ]);

        Room::create($validated);
        return redirect('/rooms');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $room)
    {
        $room = Room::where('room_number', $room)->first();

        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $room)
    {
        $types = Type_Room::query()->get();
        $room = Room::where('room_number', $room)->first();

        return view('rooms.edit', compact('room', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'room_number' => 'required|string',
            'status' => 'required|string',
            'floor' => 'required|integer',
            'image' => 'required|image',
            'type_room_id' => 'required|integer'
        ]);

        $room->update($validated);
        return redirect('/rooms');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
