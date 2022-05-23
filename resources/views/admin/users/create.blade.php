@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{ $pageTitle }}</h4>
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('admin.users.store') }}">
          @csrf
          <div class="form-group">
            <label class="form-control-label" for="name">Full Name *</label>
            <input value="{{ old('name') }}" required="" type="text" class="form-control" name="name">
            @error('name')
              <div class="text-danger my-1">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-control-label" for="email">Email *</label>
            <input value="{{ old('email') }}" required="" type="email" class="form-control" name="email">
            @error('email')
              <div class="text-danger my-1">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-control-label" for="password">Password *</label>
            <input value="{{ old('password') }}" required="" type="password" class="form-control" name="password">
            @error('password')
              <div class="text-danger my-1">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label class="form-control-label" for="password_confirmation">Password Repeat *</label>
            <input value="{{ old('password_confirmation') }}" required="" type="password" class="form-control" name="password_confirmation">
            @error('password_confirmation')
              <div class="text-danger my-1">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
</div>
@endsection

