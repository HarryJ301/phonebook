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
        <input type="text" name="search" required/>
        <button type="submit">Search</button>
    </form>

    <br>

    <p>Contacts Options: </p>
    <form action="{{ route('numbers.index')  }}" method="GET">
        <button type="submit" style="background-color: #ced2d7; border-radius: 10%" name="download" value="Download">Export Contacts as CSV</button>
    </form>

    @foreach ($numbers as $number)
        <article>
            <h3><a href="{{ route('numbers.show', $number->id) }}">{{ $number->first_name }} {{ $number->middle_name }} {{ $number->last_name }}</a></h3>

            <p>Phone Number: {{ $number->phone_number }}</p>
            <p>Mobile Number: {{ $number->mobile_number }}</p>
            @if($number->isFavourite == '1')
                <p>♡</p>
            @endif
            @if($number->isImportant == '1')
                <p>!!!</p>
            @endif


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
