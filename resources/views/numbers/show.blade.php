@extends('layouts.numberapp')

@section('title', 'Showing ' . $number->first_name)

{{--Following code based on 'CRUD actions throughout MVC', Andrew Flannery, 2021.--}}

@section('content')
    <p>Maiden Name: {{ $number->maiden_name }}</p>
    <p>Phone Number: {{ $number->phone_number }}</p>
    <p>Mobile Number: {{ $number->mobile_number }}</p>
    <p>Address: {{ $number->address }}</p>
    <p>Postcode: {{$number->postcode}}</p>
    <p>Birthday: {{ $number->birthday }}</p>
    <p>Email: {{ $number->email }}</p>
    <p>Occupation: {{ $number->occupation }}</p>
    <p>URL: {{ $number->url }}</p>
    <p>Other Names: {{ $number->other_names }}</p>
    <p>Notes: {{ $number->notes }}</p>
    @if($number->isFavourite == '1')
        <p>♡</p>
    @endif
    @if($number->isImportant == '1')
        <p>!!!</p>
    @endif

@endsection
