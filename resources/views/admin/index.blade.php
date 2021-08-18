@extends('admin.layouts.master')
@section('styles')

@endsection

@section('content')
<div class="card">
    <div class="card-header">
      	<h4 class="card-title">
        	{{ $pageTitle }}
      	</h4>
    </div>
    <div class="card-body">
    	<p class="card-text text-center">
    		Welcome! Please, don't forget to log out once you're are done.
    	</p>
    </div>
</div>
@endsection
