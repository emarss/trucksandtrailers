@extends('admin.layouts.master')
@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                {{ $pageTitle }}
                <a href="{{ route('admin.listings.edit', $listing->id) }}" class="btn btn-primary btn-sm float-right">Edit
                    listing</a>
            </h4>
        </div>
        <div class="card-body">
            <div class="card">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-header">
                            <h4 class="card-title"><b>Name</b></h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                 {{ $listing->name }}
                                 <span class="badge {{ $listing->status == 1 ? "badge-primary" : "badge-danger" }} py-1">{{$listing->getStatus() }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-header">
                            <h4 class="card-title"><b>Price</b></h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ $listing->price }} {{ $listing->currency }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-header">
                            <h4 class="card-title"><b>Priority</b></h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ $listing->priority }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <h4 class="card-title"><b>Descripion</b></h4>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {!! $listing->description !!}
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-header">
                            <h4 class="card-title"><b>Condition</b></h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ ucfirst($listing->condition) }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header">
                            <h4 class="card-title"><b>Category</b></h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ ucwords($listing->getCategory()) }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card-header">
                            <h4 class="card-title"><b>Cell Number</b></h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ $listing->cell_number }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header">
                            <h4 class="card-title"><b>WhatsApp Number</b></h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ $listing->whatsapp_number }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-header">
                            <h4 class="card-title"><b>Location</b></h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ ucfirst($listing->location) }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header">
                            <h4 class="card-title"><b>Email Address</b></h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ $listing->email }}
                            </p>
                        </div>
                    </div>
                </div>
               
                <div class="card-header">
                    <h4 class="card-title"><b>Images</b></h4>
                </div>
                <div class="card-body row">
                    <div class="col-md-4">
                        <p class="card-text">
                            <img src="{{ Storage::url("public/listings/images/$listing->featured_image") }}"
                                alt="{{ $listing->title }}" height="200">
                        </p>
                    </div>

                    <div class="col-md-4">
                        <p class="card-text">
                            @if (strlen($listing->image_2) != 0)
                                <img src="{{ Storage::url("public/listings/images/$listing->image_2") }}"
                                    alt="{{ $listing->title }}" height="200">
                            @else
                                <span class="text-info">Not available</span>
                            @endif
                        </p>
                    </div>

                    <div class="col-md-4">
                        <p class="card-text">
                            @if (strlen($listing->image_3) != 0)
                                <img src="{{ Storage::url("public/listings/images/$listing->image_3") }}"
                                    alt="{{ $listing->title }}" height="200">
                            @else
                                <span class="text-info">Not available</span>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-md-4">
                        <p class="card-text">
                            @if (strlen($listing->image_4) != 0)
                                <img src="{{ Storage::url("public/listings/images/$listing->image_4") }}"
                                    alt="{{ $listing->title }}" height="200">
                            @else
                                <span class="text-info">Not available</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="card-text">
                            @if (strlen($listing->image_5) != 0)
                                <img src="{{ Storage::url("public/listings/images/$listing->image_5") }}"
                                    alt="{{ $listing->title }}" height="200">
                            @else
                                <span class="text-info">Not available</span>
                            @endif
                        </p>
                    </div>

                    <div class="col-md-4">
                        <p class="card-text">
                            @if (strlen($listing->image_6) != 0)
                                <img src="{{ Storage::url("public/listings/images/$listing->image_6") }}"
                                    alt="{{ $listing->title }}" height="200">
                            @else
                                <span class="text-info">Not available</span>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-md-4">
                        <p class="card-text">
                            @if (strlen($listing->image_7) != 0)
                                <img src="{{ Storage::url("public/listings/images/$listing->image_7") }}"
                                    alt="{{ $listing->title }}" height="200">
                            @else
                                <span class="text-info">Not available</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-4">
                        <p class="card-text">
                            @if (strlen($listing->image_8) != 0)
                                <img src="{{ Storage::url("public/listings/images/$listing->image_8") }}"
                                    alt="{{ $listing->title }}" height="200">
                            @else
                                <span class="text-info">Not available</span>
                            @endif
                        </p>
                    </div>

                    <div class="col-md-4">
                        <p class="card-text">
                            @if (strlen($listing->image_9) != 0)
                                <img src="{{ Storage::url("public/listings/images/$listing->image_9") }}"
                                    alt="{{ $listing->title }}" height="200">
                            @else
                                <span class="text-info">Not available</span>
                            @endif
                        </p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="card-header">
                            <h4 class="card-title"><b>Created By</b></h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ $listing->user->name }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-header">
                            <h4 class="card-title"><b>Created At</b></h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{$listing->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-header">
                            <h4 class="card-title"><b>Last Updated</b></h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{$listing->updated_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
