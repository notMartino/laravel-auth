<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Brand;
use App\Pilot;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home');
    }

    public function createCarView(){
        $brands = Brand::all();
        $pilots = Pilot::all();
    
        return view('pages.createCar', compact('brands', 'pilots'));
    }

    public function storeCar(Request $request){
        // dd($request -> all());

        $validated = $request -> validate([
            'name' => 'required|string|max:64|min:2',
            'model' => 'required|string|max:64|min:2',
            'kw' => 'required|numeric|max:500|min:40',
        ]);

        $brand = Brand::findOrFail($request -> get('brand_id'));
        $car = Car::make($validated);
        $car-> brand() -> associate($brand);
        $car -> save();

        $car -> pilots() -> attach($request -> get ('pilot_id'));
        $car -> save();
        
        return redirect() -> route('indexLink');
    }

    public function editCarView($id){
        $car = Car::findOrFail($id);
        $brands = Brand::all();
        $pilots = Pilot::all();

        return view('pages.editCar', compact('car' ,'brands', 'pilots'));
    }

    public function updateCar(Request $request,$id){
        // dd($request -> all());
        $validated = $request -> validate([
            'name' => 'required|string|max:64|min:2',
            'model' => 'required|string|max:64|min:2',
            'kw' => 'required|numeric|max:500|min:40',
        ]);

        $car = Car::findOrFail($id);
        $car -> update($validated);

        $brand = Brand::findOrFail($request -> get('brand_id'));

        $car-> brand() -> associate($brand);
        $car -> save();

        $car -> pilots() -> sync($request -> get ('pilot_id'));
        // $car -> save();
        
        return redirect() -> route('indexLink');
    }

    public function deleteCar($id){

        $car = Car::findOrFail($id);
        $car -> deleted = 1;
        
        $car -> save();
        return redirect() -> route('indexLink');
    }

}
