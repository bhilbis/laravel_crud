<div class="container">
  <div class="row">
      <div class="col-md-6 mt-5 offset-md-3">
          <center><h3 class="mt-5">Contact Form</h3></center>
          <form method="POST" action="{{ route('contacts.store') }}">
              @csrf
              <div class="mb-4">
                  <label class="form-label" for="name">Name</label>
                  <input class="form-control @error('name') is-invalid @enderror" name="name" id="fullName" placeholder="Enter Your name" value="{{ old('name') }}"/>
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mb-4">
                  <label class="form-label" for="emailAddress">Email Address</label>
                  <input class="form-control @error('email') is-invalid @enderror" name="email" id="email_id" type="email" value="{{ old('email') }}" placeholder="Enter your email"/>
                  @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mb-4">
                  <label class="form-label" for="message">Message</label>
                  <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" placeholder="Type Your message" >{{ old('message') }}</textarea>
                  @error('message')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="d-grid">
                  <button class="btn btn-primary btn-lg" name="submit" type="submit">Send</button>
              </div>
          </form>
      </div>
  </div>
</div>

      