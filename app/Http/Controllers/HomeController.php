<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::query()->latest()->get();
        return view('home', compact('rooms'));
    }
}
