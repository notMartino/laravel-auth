<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Brand;
use App\Pilot;

class CarController extends Controller
{
    public function carView(){
        $cars = Car::all();
        
        return view('pages.index', compact('cars'));
    }
}
