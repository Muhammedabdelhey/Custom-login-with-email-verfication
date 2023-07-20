@extends('layouts.master')
@section('title', 'Home Page')
@section('content')
    <h1>Welcome this home page</h1>
    <h5>forget your password ?</h5>
    @php
        $email = Auth::user()->email;
    @endphp
        <a href="{{ url("ResetpasswordMail/$email" )}}">Reset</a>    
@endsection
