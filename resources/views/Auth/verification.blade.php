@extends('layouts.master')
@section('title', 'verify page')
@section('content')
<h2>Welcome Again !</h2>
    <h4>you must verify your email first </h4>
    @php
        $email=Auth::user()->email;
    @endphp
    <a href="{{ url("sendVerifyMail/$email" )}}">resend Verification mail</a>
@endsection
