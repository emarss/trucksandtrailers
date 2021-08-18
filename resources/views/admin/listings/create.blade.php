@extends('admin.layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/css/vendor-summernote.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.listings.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="h5">Basic Info</h5>
                    <hr>
                    <div class="form-group">
                        <label class="form-control-label" for="name">Name</label>
                        <input value="{{ old('name') }}" required="" type="text" name="name" class="form-control"
                            placeholder="Name">
                        @error('name')
                            <div class="text-danger my-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="formGroupExampleInput2">Description</label>
                        <textarea name="description" class="text-editor">{!! old('description') !!}</textarea>
                        @error('description')
                            <div class="text-danger my-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="condition">Condition</label>
                            <select class="form-control condition" required name="condition">
                                <option value="">Select condition</option>
                                <option {{ old('condition') == 'new' ? 'selected' : '' }} value="new">New</option>
                                <option {{ old('condition') == 'preowned' ? 'selected' : '' }} value="preowned">Preowned
                                </option>
                            </select>
                            @error('condition')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="title">Category </label>
                            <select class="form-control category" name="category" required="">
                                <option value=""></option>
                                @foreach ($categories as $category)
                                    <option {{ old('category') == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ ucwords($category->category) }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="status">Status</label>
                            <select class="form-control" required name="status">
                                <option {{ old('status') == '1' ? 'selected' : '' }} value="1">Approved
                                </option>
                                <option {{ old('status') == '0' ? 'selected' : '' }} value="0">Pending</option>
                            </select>
                            @error('status')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="priority">Priority</label>
                            <input value="{{ old('priority') == "" ? "1" : old('priority') }}" required="" type="number" name="priority"
                                class="form-control" placeholder="Enter Priority">
                            @error('priority')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h5 class="h5 mt-4">Contact Info</h5>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="cell_number">Cell Number</label>
                            <input value="{{ old('cell_number') }}" required="" type="text" name="cell_number"
                                class="form-control" placeholder="Enter mobile number">
                            @error('cell_number')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="whatsapp_number">WhatsApp Number
                                <i>(Optional)</i></label>
                            <input value="{{ old('whatsapp_number') }}" required="" type="text" name="whatsapp_number"
                                class="form-control" placeholder="Enter Whatsapp Number">
                            @error('whatsapp_number')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="location">Location
                            </label>
                            <input value="{{ old('location') }}" required="" type="text" name="location"
                                class="form-control" placeholder="Enter Location">
                            @error('location')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="email">Email Address<i>(Optional)</i></label>
                            <input value="{{ old('email') }}" required="" type="email" name="email" class="form-control"
                                placeholder="Enter Email Address">
                            @error('email')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <h5 class="h5 mt-4">Pricing</h5>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="price">Price</label>
                            <input value="{{ old('price') }}" required="" type="number" step="0.01" name="price"
                                class="form-control" placeholder="Enter Price">
                            @error('price')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="currency">Currency</label>
                            <select class="form-control currency" required name="currency">
                                <option value="">Select currency</option>
                                <option {{ old('currency') == 'USD' ? 'selected' : '' }} value="USD">USD (United States
                                    Dollar)</option>
                                <option {{ old('currency') == 'ZAR' ? 'selected' : '' }} value="ZAR">ZAR (South African
                                    Rand)</option>
                                <option {{ old('currency') == 'ZWL' ? 'selected' : '' }} value="ZWL">ZWL (Zimbabwean
                                    Dollar)</option>

                            </select>
                            @error('currency')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h5 class="h5 mt-4">Images</h5>
                    <hr>
                    <div class="form-group">
                        <label class="form-control-label" for="title">Select Featured Image *</label>
                        <div class="custom-file">
                            <input value="{{ old('featured_image') }}" required="" type="file" accept="image/*"
                                class="custom-file-input" name="featured_image">
                            <label class="custom-file-label" for="featured_image">Choose file</label>
                        </div>
                        @error('featured_image')
                            <div class="text-danger my-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="title">Select Another Image <i>(Optional)</i></label>
                            <div class="custom-file">
                                <input value="{{ old('image_2') }}" type="file" accept="image/*"
                                    class="custom-file-input" name="image_2">
                                <label class="custom-file-label" for="image_2">Choose file</label>
                            </div>
                            @error('image_2')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label" for="title">Select Another Image <i>(Optional)</i></label>
                            <div class="custom-file">
                                <input value="{{ old('image_3') }}" type="file" accept="image/*"
                                    class="custom-file-input" name="image_3">
                                <label class="custom-file-label" for="image_3">Choose file</label>
                            </div>
                            @error('image_3')
                                <div class="text-danger my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin/vendor/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/select2.full.min.js') }}"></script>

    <script>
        $('.category').select2({
            theme: 'bootstrap',
            placeholder: 'Select an option',
        });

        $('.text-editor').summernote({
            height: '100',
            dialogsInBody: true
        });
    </script>
@endsection
