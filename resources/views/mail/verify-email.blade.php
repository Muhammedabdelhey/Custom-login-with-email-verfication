@extends('layouts.master')
@section('title', 'verfiy')
@section('content')
    <h3>Please Verfiy Your Email </h3>
    <a href="{{ url("verify/$email") }}">Verfiy</a>
@endsection
