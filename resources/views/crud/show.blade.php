   @extends('layout.app3')

@section('isi1')
<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .nama {
        text-align: left;
        max-width: 400px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .nama h2 {
        font-size: 24px;
    }

    .nama table {
        width: 100%;
    }

    .nama table td {
        padding: 10px;
    }

    .btn-back {
        margin-top: 20px;
    }
</style>

<div class="container">
    <div class="nama">
        <h2>Contact Details</h2>
        <table>
            <tr>
                <td><strong>Name:</strong></td>
                <td>{{ $contact->name }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $contact->email }}</td>
            </tr>
            <tr>
                <td><strong>Message:</strong></td>
                <td>{{ $contact->message }}</td>
            </tr>
        </table>

        <a href="{{ route('index') }}" class="btn btn-primary btn-back">Back</a>
    </div>
</div>
@endsection
