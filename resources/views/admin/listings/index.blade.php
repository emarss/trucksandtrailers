@extends('admin.layouts.master')
@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                {{ $pageTitle }}
                <a href="{{ route('admin.listings.create') }}" class="btn btn-primary btn-sm float-right">Add New</a>
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm table-striped" id="data-table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Category</th>
                            <th scope="col" class="text-center">Last Updated</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($listings as $listing)
                            <tr>
                                <th class="align-middle text-center" scope="row">{{ $listing->id }}</th>
                                <td>{{ $listing->name }}</th>
                                <td>
                                    <span
                                        class="badge {{ $listing->status == 1 ? 'badge-primary' : 'badge-danger' }} py-1">{{ $listing->getStatus() }}</span>
                                    </th>
                                <td>{{ $listing->price }} {{ $listing->currency }}</th>
                                <td>{{ ucwords($listing->getCategory()) }}</th>
                                <td>{{ $listing->updated_at->diffForHumans() }}</th>
                                <td class="align-middle text-center">
                                    <a href="{{ route('admin.listings.show', $listing->id) }}"
                                        class="btn btn-sm btn-primary">Show</a>
                                    <a href="{{ route('admin.listings.edit', $listing->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <button
                                        onclick="confirmDelete('{{ route('admin.listings.destroy', $listing->id) }}')"
                                        class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No listings found. Click <a
                                        href="{{ route('admin.listings.create') }}">this link</a> to create new.</td>
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
        $('#data-table').DataTable({
            "order": [
                [0, "desc"]
            ]
        });
    });
</script>
@endsection
