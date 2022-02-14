@extends('layouts.main-layout')

@section('content')

    <videogames-component user="{{Auth::check()}}"></videogames-component>

@endsection
