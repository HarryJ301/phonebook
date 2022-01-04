@extends('layouts.numberapp')

@section('title', 'Showing ' . $number->name)

{{--Following code based on 'CRUD actions throughout MVC', Andrew Flannery, 2021.--}}

@section('content')
    <p>{{ $number->phone_number }}</p>
@endsection
