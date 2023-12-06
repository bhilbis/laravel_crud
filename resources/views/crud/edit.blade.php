@extends('layout.app3')

@section('isi1')

    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-4 offset-md-3">
                <center><h3 class="mt-5">Edit Contact</h2></center>
            @if($errors->any())
            <div class="alert alert-danger mt-3">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('contacts.update', $contact->id) }}" class="mt-3">
        @csrf
        @method('PUT')
        <div class="form-group mb-4">
            <label class="form-label" for="name">Name :</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $contact->name }}">
        </div>
        <div class="form-group mb-4">
            <label class="form-label" for="email">email :</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ $contact->email }}">
        </div>
        <div class="form-group mb-4">
            <label class="form-label" for="message">Message :</label>
            <textarea name="message" class="form-control" id="message" rows="4">{{ $contact->message }}</textarea>
        </div>
        <div class="d-grid mt-3">
        <button type="submit" class="btn btn-primary">Update</button>
        </div>    
    </form>
        </div>
    </div>
</div>
@endsection
