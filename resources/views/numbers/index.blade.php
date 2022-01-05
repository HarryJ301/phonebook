@extends('layouts.numberapp')

@section('title', 'All of your contacts')

{{--Following code based on 'CRUD actions throughout MVC', Andrew Flannery, 2021.--}}

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{ route('numbers.index')  }}" method="GET">
        <p>Search by Name or Number</p>
        <input type="text" name="search" required></input>
        <button type="submit">Search</button>
    </form>

    @foreach ($numbers as $number)
        <article>
            <h3><a href="{{ route('numbers.show', $number->id) }}">{{ $number->first_name }} {{ $number->middle_name }} {{ $number->last_name }}</a></h3>

            <p>Phone Number: {{ $number->phone_number }}</p>
            <p>Mobile Number: {{ $number->mobile_number }}</p>

            <form action="{{ route('numbers.destroy', $number->id) }}" method="POST">
                <a class="btn btn-blue" href="{{ route('numbers.show', $number->id) }}">Show</a>
                <a class="btn btn-blue" href="{{ route('numbers.edit', $number->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-red">Delete</button>
            </form>
        </article>
    @endforeach

    {{ $numbers->links() }}
@endsection
