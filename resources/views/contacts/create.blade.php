@extends('layout')

@section('content')
    <a href="{{ route('contacts.index') }}">&larr; Back to list</a>
    <h2>Add Contact</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf

        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone') }}">

        <br><br>
        <button type="submit" class="btn">Save Contact</button>
    </form>
@endsection
