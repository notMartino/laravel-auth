<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pilot;

class PilotController extends Controller
{
    public function pilotDetailsView($id){
        $pilot = Pilot::findOrFail($id);

        return view('pages.pilotDetails', compact('pilot'));
    }
}
