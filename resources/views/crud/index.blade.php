@extends('layout.app3')

@section('isi1')
<style>
    body {
        font-family: Arial, sans-serif;
    }
            
    .container {
        text-align: center;
        margin-top: 20px;
    }

    h2 {
        font-weight: bold;
    }

    nav li {
        margin: 0 2px 0 2px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: none;
        padding: 8px;
        text-align: center;
    }

    .btn1 {
        padding: 10px 20px;
        text-decoration: none;
        margin: 5px;
    }

    .btn-primary {
        background-color: #2752ae;
        color: white;
        align-content: center;
    }

    .alert {
        background-color: #27ae60;
        color: white;
        padding: 10px;
        text-align: center;
    }
</style>
    <div class="container mt-5">
    <h2>Contacts</h2>
    </div>
    
    @if(count($contacts) > 0)
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <div class="alert alert-info mt-3">
        No contacts available.
    </div>
@endif

    <div class="btn1 text-center">
    <a href="{{ route('kontak') }}" class="btn btn-primary">New Contact</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="fixed-bottom mb-3 me-3">
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
            </form>
        @endauth
    </div>
@endsection
