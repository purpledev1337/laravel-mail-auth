@extends('layouts.main-layout')

@section('content')

    @auth
    <videogames-component></videogames-component>
    @else
    <h1>Hello, you need to login to see our list</h1>

    @endauth

@endsection
