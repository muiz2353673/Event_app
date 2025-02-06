<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Event::paginate(5); // Adjust as needed
        return view('dashboard', compact('events'));
    }
    
    
}

