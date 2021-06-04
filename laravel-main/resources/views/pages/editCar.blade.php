@extends('layouts.main-layout')

@section('content')
    <main>
        <h3>
            Edit Car - {{$car -> name}} {{$car -> model}}
        </h3>
        <form method="POST" action="{{route('updateCarLink', $car -> id)}}">
            @method('POST')
            @csrf

            <ul>
                <li>
                    <input type="text" name="name" placeholder="Name" value="{{$car -> name}}" required>
                    <input type="text" name="model" placeholder="Model" value="{{$car -> model}}" required>
                    <input type="number" name="kw" placeholder="Kw" value="{{$car -> kw}}" required>
                    <select name="brand_id" required>
                        @foreach ($brands as $brand)
                            @if ($brand -> id == $car -> brand -> id)
                            <option value="{{$brand -> id}}" selected>{{$brand -> name}}</option>
                            @endif
                            <option value="{{$brand -> id}}">{{$brand -> name}}</option>
                        @endforeach
                    </select>
                </li>

                @foreach ($pilots as $pilot)
                <li>
                    @php
                        $found = false;
                        foreach ($car -> pilots as $pilot2){
                            if($pilot2 -> id == $pilot -> id){
                                $found = true;
                                break;
                            }
                        }
                    @endphp
                    <label for="pilot_id[]">{{$pilot -> firstname . ' ' .$pilot -> lastname}}</label>
                    
                    @if($found)
                        <input type="checkbox" name="pilot_id[]" value="{{$pilot -> id}}" checked>
                    @else
                        <input type="checkbox" name="pilot_id[]" value="{{$pilot -> id}}">
                    @endif
                </li>
                @endforeach
                
                <li>
                    <input type="submit" value="Edit">
                </li>
            </ul>
        </form>
    </main>
@endsection