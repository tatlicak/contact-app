@extends('layouts.main')

@section('title', 'Contact App | Profile Information')

@section('content')
<main class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              Settings
            </div>
            <div class="list-group list-group-flush">
              <a href="profile.html" class="list-group-item list-group-item-action active">Profile</span></a>
              <a href="password.html" class="list-group-item list-group-item-action">Password</span></a>
              <a href="#" class="list-group-item list-group-item-action">Import & Export</span></a>
            </div>
          </div>
        </div><!-- /.col-md-3 -->

        <div class="col-md-9">
          <form action="{{ route('user-profile-information.update') }}" method="POST">
                @csrf
                @method('PUT')
              <div class="card">
                <div class="card-header card-title">
                  <strong>Edit Profile</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                        @if (session('status') === 'profile-information-updated')
                            <div class="alert alert-success">Profile has been updated.</div>
                        @endif
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" id="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" id="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" id="phone" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" name="company" value="{{ old('company', $user->company) }}" id="company" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" name="country" value="{{ old('country', $user->country) }}" id="country" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" value="{{ old('address', $user->address) }}" id="address" rows="2" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="offset-md-1 col-md-3">
                      <div class="form-group">
                        <label for="bio">Profile picture</label>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new img-thumbnail" style="width: 150px; height: 150px;">
                            <img src="https://via.placeholder.com/150x150" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists img-thumbnail"
                            style="max-width: 150px; max-height: 150px;"></div>
                          <div class="mt-2">
                            <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select
                                image</span><span class="fileinput-exists">Change</span><input type="file"
                                name="profile_picture"></span>
                            <a href="#" class="btn btn-outline-secondary fileinput-exists"
                              data-dismiss="fileinput">Remove</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                          <button type="submit" class="btn btn-success">Update Profile</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection

@push('styles')
<link href="{{ asset('css/jasny-bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
@endpush