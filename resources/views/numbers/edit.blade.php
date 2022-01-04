@extends('layouts.numberapp')

@section('title', 'Edit number')

{{--Following code based on 'CRUD actions throughout MVC', Andrew Flannery, 2021.--}}

@section('content')
    <form action="{{ route('numbers.update', $number->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="my-10">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class=" p-2 bg-gray-200 @error('name') is-invalid @enderror"> Previous name: {{ $number->name }} </input>

            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="my-10">
            <label for="phone_number">Number:</label>
            <input type="text" name="phone_number" id="phone_number" class=" p-2 bg-gray-200 @error('phone_number') is-invalid @enderror"> Previous Number: {{ $number->phone_number }}</input>

            @error('numbers')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>



        <button type="submit" class="btn btn-blue">Update</button>
    </form>
@endsection
