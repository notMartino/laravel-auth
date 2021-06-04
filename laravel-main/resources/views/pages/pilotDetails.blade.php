@extends('layouts.main-layout')

@section('content')
    <main>
        <h3>
            Pilot Details - {{$pilot -> firstname . ' ' . $pilot -> lastname}}
        </h3>
        <ul>
            <li>
                <h4>
                    Cars:
                </h4>
            </li>
            @foreach ($pilot -> cars as $car)
                <li>
                    {{$car -> name}}
                </li>
            @endforeach

        </ul>
    </main>
@endsection