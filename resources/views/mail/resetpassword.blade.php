@extends('layouts.master')
@section('title', 'verfiy')
@section('content')
    <h3> Click Reset  Your Passeord </h3>
    <a href="{{ url("Resetpassword/$email" )}}">Reset</a>    
    @endsection
