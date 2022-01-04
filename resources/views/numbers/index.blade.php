@extends('layouts.numberapp')

@section('title', 'All of your numbers')

{{--Following code based on 'CRUD actions throughout MVC', Andrew Flannery, 2021.--}}

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @foreach ($numbers as $number)
        <article>
            <h3><a href="{{ route('numbers.show', $number->id) }}">{{ $number->name }}</a></h3>

            <p>{{ $number->phone_number }}</p>

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
