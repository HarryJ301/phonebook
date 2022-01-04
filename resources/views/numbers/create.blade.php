@extends('layouts.numberapp')

@section('title', 'New number')

{{--Following code based on 'CRUD actions throughout MVC', Andrew Flannery, 2021.--}}

@section('content')
    <form action="{{ route('numbers.store') }}" method="POST">
        @csrf

        <div class=" my-10">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class=" p-2 bg-gray-200 @error('name') is-invalid @enderror" />

            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class=" my-10">
            <label for="phone_number">Number:</label>
            <input type="text" name="phone_number" id="phone_number"  class=" p-2 bg-gray-200 @error('phone_number') is-invalid @enderror"></input>

            @error('phone_number')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="my-10">
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" id="user_id" value="{{optional(Auth::user())->id}}" readonly class=" p-2 bg-gray-200 @error('user_id') is-invalid @enderror"> </input>

            @error('user_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-blue">Create</button>
    </form>
@endsection
