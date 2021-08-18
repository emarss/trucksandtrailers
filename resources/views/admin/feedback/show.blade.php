@extends('admin.layouts.master')
@section('styles')

@endsection

@section('content')
<div class="container-fluid">
  <div class="card">
      <div class="card-header">
        	<h4 class="card-title">
          	{{ $pageTitle }}
        	</h4>
      </div>
      <div class="card-body">
        <dl>
            <dt>Name</dt>
            <dd class="ml-3">{{ $feedback->name }}</dd>

            <dt>Email</dt>
            <dd class="ml-3"><a href="mailto:{{ $feedback->email }}">{{ $feedback->email }}</a></dd>

            @if($feedback->website != "")
              <dt>Email</dt>
              <dd class="ml-3"><a href="{{ $feedback->website }}">{{ $feedback->website }}</a></dd>
            @endif

            <dt>Message</dt>
            <dd class="ml-3">{{ $feedback->message }}</dd>
        </dl><hr>
        <button onclick="confirmDelete('{{ route('admin.feedback.destroy', $feedback->id) }}')" class="btn btn-sm btn-danger">Delete</button>

      </div>
  </div>
</div>
@endsection
