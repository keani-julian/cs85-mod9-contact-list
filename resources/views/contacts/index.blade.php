@extends('layout')

@section('content')
    <a href="{{ route('contacts.create') }}" class="btn">+ Add Contact</a>

    @if ($contacts->isEmpty())
        <p>No contacts yet. Add your first one!</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>
                            <a href="{{ route('contacts.edit', $contact) }}" class="btn">Edit</a>

                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Delete this contact?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
