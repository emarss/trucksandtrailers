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
      	<div class="table-responsive">
        	<table class="table table-hover table-sm table-striped" id="data-table">
          		<thead class="thead-dark">
           	 		<tr>
	              		<th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Email</th>
              			<th scope="col" class="text-center">Phone</th>
              			<th scope="col" class="text-center">Created At</th>
              			<th scope="col" class="text-center">Last Updated</th>
              			<th scope="col" class="text-center">Actions</th>
            		</tr>
          		</thead>
          	<tbody>
              @forelse($feedbackMessages as $feedback)
                <tr>
                    <th class="align-middle text-center" scope="row">{{ $feedback->id }}</th>
                    <td>{{ $feedback->name }}</th>
                    <td>{{ $feedback->email }}</th>
                    <td><a href="tel:{{ $feedback->phone }}">{{ $feedback->phone }}</a></th>
                    <td>{{ $feedback->created_at->diffForHumans() }}</th>
                    <td>{{ $feedback->updated_at->diffForHumans() }}</th>
                    <td class="align-middle text-center">
                      <a href="{{ route('admin.feedback.show', $feedback->id) }}" class="btn btn-sm btn-primary">Show</a>
                      <button onclick="confirmDelete('{{ route('admin.feedback.destroy', $feedback->id) }}')" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7">No feedback messages found.</td>
                </tr>
              @endif
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
      $(document).ready(function() {
          $('#data-table').DataTable( {
              "order": [[ 0, "desc" ]]
          } );
      } );
    </script>
@endsection
