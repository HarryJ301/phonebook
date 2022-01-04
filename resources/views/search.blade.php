@extends('layouts.numberapp')

@section('title', 'Search Contacts')

@section('content')
    <form action="{{ route('search')  }}" method="GET">

        <input type="text" name="search" required/>
        <button type="submit">Search</button>
    </form>

    <div class="container">
        @if($numbers->isNotEmpty())
            <p> Search results for <b> {{ $search }} </b> are :</p>
            <h2>Contacts:</h2>
                @foreach($numbers as $number)

                    <p>First Name: {{ $number->first_name }}</p>
                    <p>Middle Name: {{ $number->middle_name }}</p>
                    <p>Last Name: {{ $number->last_name }}</p>
                    <p>Maiden Name: {{ $number->maiden_name }}</p>
                    <p>Phone Number: {{ $number->phone_number }}</p>
                    <p>Mobile Number: {{ $number->mobile_number }}</p>
                    <p>Birthday: {{ $number->birthday }}</p>
                    <p>Email: {{ $number->email }}</p>
                    <p>Occupation: {{ $number->occupation }}</p>
                    <p>URL: {{ $number->url }}</p>
                    <p>Other Names: {{ $number->other_names }}</p>
                    <p>Notes: {{ $number->notes }}</p>

                <form action="{{ route('numbers.destroy', $number->id) }}" method="POST">
                    <a class="btn btn-blue" href="{{ route('numbers.show', $number->id) }}">Show</a>
                    <a class="btn btn-blue" href="{{ route('numbers.edit', $number->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-red">Delete</button>
                </form>

                @endforeach
        @else
            <div>
                <h2>No Contacts found with the given search terms.</h2>
            </div>
        @endif
    </div>

@endsection
