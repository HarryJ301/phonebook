@extends('layouts.numberapp')

@section('title', 'New number')

{{--Following code based on 'CRUD actions throughout MVC', Andrew Flannery, 2021.--}}

@section('content')
    <form action="{{ route('numbers.store') }}" method="POST">
        @csrf

        <div class=" my-10">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" class=" p-2 bg-gray-200 @error('first_name') is-invalid @enderror" />

            @error('first_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class=" my-10">
            <label for="middle_name">Middle Name:</label>
            <input type="text" name="middle_name" id="middle_name" class=" p-2 bg-gray-200 @error('middle_name') is-invalid @enderror" />

            @error('middle_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class=" my-10">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" class=" p-2 bg-gray-200 @error('last_name') is-invalid @enderror" />

            @error('last_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class=" my-10">
            <label for="maiden_name">Maiden Name:</label>
            <input type="text" name="maiden_name" id="maiden_name" class=" p-2 bg-gray-200 @error('maiden_name') is-invalid @enderror" />

            @error('maiden_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class=" my-10">
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="mobile_number" class=" p-2 bg-gray-200 @error('phone_number') is-invalid @enderror"></input>

            @error('phone_number')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class=" my-10">
            <label for="mobile_number">Mobile Number:</label>
            <input type="text" name="mobile_number" id="mobile_number"  class=" p-2 bg-gray-200 @error('mobile_number') is-invalid @enderror"></input>

            @error('mobile_number')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class=" my-10">
            <label for="birthday">Birthday:</label>
            <input type="date" name="birthday" id="birthday"  class=" p-2 bg-gray-200 @error('birthday') is-invalid @enderror"></input>

            @error('birthday')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class=" my-10">
            <label for="email">Email Address:</label>
            <input type="text" name="email" id="email"  class=" p-2 bg-gray-200 @error('email') is-invalid @enderror"></input>

            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class=" my-10">
            <label for="occupation">Occupation:</label>
            <input type="text" name="occupation" id="occupation"  class=" p-2 bg-gray-200 @error('occupation') is-invalid @enderror"></input>

            @error('occupation')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class=" my-10">
            <label for="url">Contacts Website (URL):</label>
            <input type="text" name="url" id="url"  class=" p-2 bg-gray-200 @error('url') is-invalid @enderror"></input>

            @error('url')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class=" my-10">
            <label for="other_names">Other Names:</label>
            <input type="text" name="other_names" id="other_names"  class=" p-2 bg-gray-200 @error('other_names') is-invalid @enderror"></input>

            @error('other_names')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class=" my-10">
            <label for="notes">Notes:</label>
            <input type="text" name="notes" id="notes"  class=" p-2 bg-gray-200 @error('notes') is-invalid @enderror"></input>

            @error('notes')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-blue">Create</button>
    </form>
@endsection
