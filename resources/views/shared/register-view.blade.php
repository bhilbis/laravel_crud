<div class="container">
    <div class="row">
    <div class="col-md-6 mt-5 offset-md-3">
        <center><h3 class="mt-5">Registration Form</h3></center>
        <form method="POST" action="{{ route('doRegister') }}">
            @csrf
            <!-- Tambahkan field-form untuk pendaftaran di sini -->
            <div class="mb-4">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" name="name" id="name" placeholder="Enter Your name" value="{{ old('name') }}"/>
            </div>

            <div class="mb-4">
                <label class="form-label" for="email">Email Address</label>
                <input class="form-control" name="email" id="email" type="email" value="{{ old('email') }}" placeholder="Enter your email"/>
            </div>

            <div class="mb-4">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" name="password" id="password" type="password" placeholder="Enter your password"/>
            </div>

            <div class="mb-4">
                <label class="form-label" for="password_confirmation">Confirm Password</label>
                <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm your password"/>
            </div>

            <div class="d-grid">
                <button class="btn btn-primary btn-lg" name="submit" type="submit">Register</button>
            </div>
        </form>
        <div class="mt-3">
            <p>Already have an account? <a href="{{ route('login') }}">Log In</a></p>
        </div>
    </div>
</div>
</div>
