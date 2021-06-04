@extends('layouts.main-layout')

@section('content')
    <main>
        <h3>
            Create Car
        </h3>
        <form method="POST" action="{{route('storeCarLink')}}">
            @method('POST')
            @csrf

            <ul>
                <li>
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="text" name="model" placeholder="Model" required>
                    <input type="number" name="kw" placeholder="Kw" required>
                    <select name="brand_id" required>
                        <option value="" selected disabled>Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand -> id}}">{{$brand -> name}}</option>
                        @endforeach
                    </select>
                </li>

                @foreach ($pilots as $pilot)
                <li>
                    <label for="pilot_id[]">{{$pilot -> firstname . ' ' .$pilot -> lastname}}</label>
                    <input type="checkbox" name="pilot_id[]" value="{{$pilot -> id}}">
                </li>
                @endforeach
                
                <li>
                    <input type="submit" value="Create">
                </li>
            </ul>
        </form>
    </main>
@endsection