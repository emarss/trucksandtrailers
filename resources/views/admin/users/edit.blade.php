@extends('admin.layouts.master')

@section('content')
  <div class="container-fluid">
    <form method="post" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic Details</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="form-group col-6">
              <label class="form-control-label" for="name">Full Name *</label>
              <input value="{{ $user->name }}" required="" type="text" class="form-control" name="name">
              @error('name')
                <div class="text-danger my-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-6">
              <label class="form-control-label" for="email">Email *</label>
              <input value="{{ $user->email }}" required="" type="email" class="form-control" name="email">
              @error('email')
                <div class="text-danger my-1">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Additional Info</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="form-group col-6">
              <label class="form-control-label" for="role">Role</label>
              <select class="form-control custom-select" name="role" required="">
                <option value="">Select option</option>
                <option {{ $user->profile->role == 'admin' ? "selected" : '' }} value="admin">Admin</option>
                <option {{ $user->profile->role == 'author' ? "selected" : '' }} value="author">Author</option>
                <option {{ $user->profile->role == 'moderator' ? "selected" : '' }} value="moderator">Moderator</option>
              </select>
              @error('role')
                <div class="text-danger my-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-6">
              <label class="form-control-label" for="national_id">National Id</label>
              <input value="{{ $user->profile->national_id }}" type="text" class="form-control" name="national_id">
              @error('national_id')
                <div class="text-danger my-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-8">
              <label class="form-control-label" for="address">Address</label>
              <input value="{{ $user->profile->address }}" type="text" class="form-control" name="address">
              @error('address')
                <div class="text-danger my-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-4">
              <label class="form-control-label" for="cell_number">Cell Number</label>
              <input value="{{ $user->profile->cell_number }}" type="text" class="form-control" name="cell_number">
              @error('cell_number')
                <div class="text-danger my-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-12">
              <label class="form-control-label" for="bio">Short Bio</label>
              <textarea name="bio" cols="30" rows="5" class="form-control">{{ $user->profile->bio }}</textarea>
              @error('bio')
                <div class="text-danger my-1">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">More Info</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="form-group col-4">
              <label class="form-control-label" for="facebook">Facebook Link</label>
              <input value="{{ $user->profile->facebook }}" type="url" class="form-control" name="facebook">
              @error('facebook')
                <div class="text-danger my-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-4">
              <label class="form-control-label" for="twitter">Twitter Link</label>
              <input value="{{ $user->profile->twitter }}" type="url" class="form-control" name="twitter">
              @error('twitter')
                <div class="text-danger my-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-4">
              <label class="form-control-label" for="linkedin">LinkedIn Link</label>
              <input value="{{ $user->profile->linkedin }}" type="url" class="form-control" name="linkedin">
              @error('linkedin')
                <div class="text-danger my-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-8">
              <label class="form-control-label" for="avatar">Account Avatar</label>
              <div class="custom-file">
                <input value="{{ old('avatar') }}" type="file" accept="image/*" class="custom-file-input" name="avatar">
                <label class="custom-file-label" for="avatar">Choose file</label>
              </div>
              @error('avatar')
                <div class="text-danger my-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-4">
              <div class="row">
                <div class="col-12 text-center">
                  <img src="{{ $user->profile->thumbnail() }}" style="max-height: 40px" class="avatar rounder-circle">
                </div>
                <div class="col-12 text-center">
                  <small class="text-info">Current Avatar</small>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
          </div>
        </div>
      </div>
  </form>
  <form action="{{ route('admin.password', $user->id) }}" class="form" method="post">
    @csrf
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Change Password</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="form-group col-6">
              <label class="form-control-label" for="password">New Password</label>
              <input type="password" class="form-control" onautocomplete="new-password" name="password">
              @error('password')
                <div class="text-danger my-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-6">
              <label class="form-control-label" for="password_confirmation">Password Repeat</label>
              <input type="password" class="form-control" onautocomplete="new-password" name="password_confirmation">
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
          </div>
        </div>
      </div>
  </form>
</div>
@endsection

