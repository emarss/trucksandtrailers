@extends('admin.layouts.master')

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
              			<th scope="col" class="text-center">Email</th>
              			<th scope="col" class="text-center">Created At</th>
              			<th scope="col" class="text-center">Last Updated</th>
              			<th scope="col" class="text-center">Actions</th>
            		</tr>
          		</thead>
          	<tbody>
              @forelse($newsletters as $newsletter)
                <tr>
                    <th class="align-middle text-center" scope="row">{{ $newsletter->id }}</th>
                    <td>{{ $newsletter->email }}</th>
                    <td>{{ $newsletter->created_at->diffForHumans() }}</th>
                    <td>{{ $newsletter->updated_at->diffForHumans() }}</th>
                    <td class="align-middle text-center">
                      <a href="mailto:{{ $newsletter->email }}" target="_blank" class="btn btn-sm btn-primary">Mail</a>
                      <button onclick="confirmDelete('{{ route('admin.newsletters.destroy', $newsletter->id) }}')" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7">No newsletters found.</td>
                </tr>
              @endif
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection

@section('styles')
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script>
      $(document).ready(function() {
          $('#data-table').DataTable( {
              "order": [[ 0, "desc" ]],
              dom: 'Bfrtip',
              buttons: [
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5'
        ]              
          } );
      } );
    </script>
@endsection