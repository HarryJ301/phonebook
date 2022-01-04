@extends('layouts.numberapp')

@section('title', 'All of your contacts')

{{--Following code based on 'CRUD actions throughout MVC', Andrew Flannery, 2021.--}}

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @foreach ($numbers as $number)
        <article>
            <h3><a href="{{ route('numbers.show', $number->id) }}">{{ $number->first_name }} {{ $number->middle_name }} {{ $number->last_name }}</a></h3>

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
        </article>
    @endforeach

    {{ $numbers->links() }}
@endsection
