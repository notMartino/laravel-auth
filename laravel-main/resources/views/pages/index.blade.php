@extends('layouts.main-layout')

@section('content')
    <main>
        <h2>
            Cars List
        </h2>
        <ul>
            @foreach ($cars as $car)
                <li>
                    {{'Name: ' . $car -> name}} <br>
                    {{'Model: ' . $car -> model}}
                    <a href="{{route('editCarLink', $car -> id)}}">Edit</a>
                    <a href="{{route('deleteCarLink', $car -> id)}}">Delete</a>                    
                    <h5>Pilots</h5>
                    <ul>
                        @foreach ($car -> pilots as $pilot)
                            <li>
                                <a href="{{route('pilotDetailsLink', $pilot -> id)}}">
                                    {{$pilot -> firstname . ' ' . $pilot -> lastname}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </main>
@endsection